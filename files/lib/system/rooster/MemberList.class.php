<?php

namespace cms\system\rooster;
use cms\data\content\Content;
use wcf\system\request\RouteHandler;
use wcf\system\WCF;

/**
 * Class MemberList
 * Basic Member List Class with inline Template. Taken from a refactored PHP Content Type.
 *
 * For a list of possible refactorings check TodoList of Member List Class
 *
 * @todo improve Blizard API and implement API Exceptions
 * @todo apply WCF Code Style
 * @todo use LESS instead of CSS
 * @todo find useful default Values
 * @todo continue Refactoring
 *
 * @author Rene Gerritsen <rene.gerritsen@me.com>
 * @package cms\system\rooster
 */
class MemberList extends RoosterCollection
{
    const HORDE = 1;
    const ALLIANCE = 2;

    /**
     * Base Information which data
     */
    protected $baseUrl = "http://bilder.mmorpg-mondklingen.de";
    protected $realm = 'Blackmoore';
    protected $guild = 'Mondklingen';
    protected $key = '5etvhcrs28dsebngqjhxnsfjydw6pv6z';
    protected $local = 'de_DE';
    protected $fields = 'members';
    protected $guildRankPrefix = 'A_';
    protected $memberBackground = 'http://bilder.mmorpg-mondklingen.de/bg/A_bg.png';
    protected $backgroundPicture = '';
    protected $hordeOrAlliance;
    /** @var Content */
    protected $rankHeadings;

    /**
     * A List of Rooster Member
     *
     * @var RoosterMember[]
     */
    protected $member;

    /**
     * Collection of Ranks
     *
     * @var GuildRank[]
     */
    protected $ranks;

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @param string $realm
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;
    }

    /**
     * @return string
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param string $guild
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param string $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Gets Guildrank Prefix
     * @deprecated
     *
     * @return string
     */
    public function getGuildRankPrefix()
    {
        if ($this->getHordeOrAlliance() === self::HORDE) {
            return 'H_';
        }

        if ($this->getHordeOrAlliance() === self::ALLIANCE) {
            return 'A_';
        }

        return '';
    }

    /**
     * @param string $guildRankPrefix
     */
    public function setGuildRankPrefix($guildRankPrefix)
    {
        $this->guildRankPrefix = $guildRankPrefix;
    }

    /**
     * @return string
     */
    public function getMemberBackground()
    {
        return $this->memberBackground;
    }

    /**
     * @param string $memberBackground
     */
    public function setMemberBackground($memberBackground)
    {
        $this->memberBackground = $memberBackground;
    }

    /**
     * Get Horde or Alliance
     *
     * @return integer
     */
    public function getHordeOrAlliance()
    {
        return $this->hordeOrAlliance;
    }

    /**
     * Set Horde Or Alliance
     *
     * @param integer $hordeOrAlliance
     */
    public function setHordeOrAlliance($hordeOrAlliance)
    {
        if ($hordeOrAlliance == self::HORDE) {
            $this->hordeOrAlliance = self::HORDE;
            return;
        }
        $this->hordeOrAlliance = self::ALLIANCE;

    }

    /**
     * Get Fraction Background
     *
     * @return string
     */
    public function getFractionBackground()
    {
        $basePath = WCF::getPath('cms');
        $fraction = ($this->getHordeOrAlliance() === static::HORDE)?'horde':'alliance';
        return $basePath . "/images/wowrooster/background/$fraction.png";
    }

    /**
     * Sets the Rank Headings
     *
     * @param Content $rankHeadings
     */
    public function setRankHeadings($rankHeadings)
    {
        $this->rankHeadings = $rankHeadings;
    }

    /**
     * Get Background Picture
     *
     * @return string
     */
    public function getBackgroundPicture()
    {
        return $this->backgroundPicture;
    }

    /**
     * Set Background Picture
     *
     * @param string $backgroundPicture
     */
    public function setBackgroundPicture($backgroundPicture)
    {
        $this->backgroundPicture = $backgroundPicture;
    }

    /**
     * Compare 2 Member by Rank
     *
     * @param array $a
     * @param array $b
     *
     * @return int
     */
    function compareByRank($a, $b)
    {
        if ($a['rank'] == $b['rank']) {
            return 0;
        }

        return ($a['rank'] < $b['rank']) ? -1 : 1;
    }

    /**
     * Request Data From Blizzard and decode to Array
     *
     * @todo create Mapping for Special Name. Maybe Translation File
     *
     * @return array
     */
    private function getGuildData()
    {
        $data = null;
        $Realm = rawurlencode($this->realm);
        $Guild = rawurlencode($this->guild);
        $Key = $this->key;
        /** @todo make Local Dynamic */
        $Local = 'de_DE';//$this->local;
        $Fields = $this->fields;
        $url = 'https://eu.api.battle.net/wow/guild/' . $Realm . '/' . $Guild . '?fields=' . $Fields . '&locale=' . $Local . '&apikey=' . $Key . '';
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $data = @file_get_contents($url, false, stream_context_create($arrContextOptions));
        $decoded = json_decode($data, true);

        return $decoded;
    }

    /**
     * Init the Rooster Member Array
     *
     * @return RoosterMember[]
     */
    public function getMember()
    {
        if (empty($this->member) || $this->member === null) {
            $this->initMembers();
        }

        return $this->member;
    }

    /**
     * Gets the Ranks
     *
     * @return GuildRank[]
     */
    public function getRanks()
    {
        if (empty($this->ranks) || $this->ranks === null)  {
            $this->initMembers();
        }

        return $this->ranks;
    }

    /**
     * Inits the Member Array
     *
     * @return $this
     */
    private function initMembers()
    {
        $decoded = $this->getGuildData();
        $rawMembers = $decoded[$this->fields];
        uasort($rawMembers, array($this, 'compareByRank'));
        $this->member = array();
        foreach ($rawMembers as $member) {
            $roosterMember = new RoosterMember($member);
            $this->member[] = $roosterMember;
        }
        $this->initRanks();

        return $this;
    }

    /**
     * Init Ranks
     *
     * @return $this
     */
    private function initRanks()
    {
        /** @var RoosterMember $member */
        foreach ($this->member as $member) {
            $rankId = $member->getRankIndex();
            if (!isset($this->ranks[(int)$rankId])) {
                $guildRank = new GuildRank(array());
                $this->ranks[(int)$rankId] = $guildRank;
                $guildRank->setName($this->rankHeadings->__get('rank_' . ($rankId + 1)));
                $guildRank->setIsText($this->rankHeadings->__get('rank_is_image_' . ($rankId + 1)) == 1);
            }
            $this->ranks[(int)$rankId]->addMember($member);
        }

        return $this;
    }

    /**
     * Renders the List
     *
     * @return String
     */
    public function render()
    {
        WCF::getTPL()->assign(array(
            'ranks' => $this->getRanks(),
            'memberList' => $this
        ));
        return WCF::getTPL()->fetch('wowRoosterMemberList', 'cms');
    }
}
