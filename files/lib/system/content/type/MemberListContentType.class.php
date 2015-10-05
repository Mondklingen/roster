<?php
namespace cms\system\content\type;

use cms\data\content\Content;

/**
 * Member List Content Type
 *
 * This Content Type adds a Member List to possible Content Types for Code Quake CMS for WCF
 *
 * WARING: This is a Alpha Version !
 * ---------------------------------
 * Use this Extension only if u know what your doing !
 *
 * @version 0.1.0 Alpha !
 * @author Rene Gerritsen <rene.gerritsen@me.com>
 * @copyright 2015 Rene Gerritsen
 * @license Affero General Public License <https://gnu.org/licenses/agpl.html>
 * @package de.phoenix-plugins
 */
class MemberListContentType extends AbstractContentType
{

    /**
     * @see    \cms\system\content\type\AbstractContentType::$icon
     */
    protected $icon = 'icon-code';

    /**
     * @see    \cms\system\content\type\AbstractContentType::$previewFields
     */
    protected $previewFields = array('guild');

    /**
     * @see    \cms\system\content\type\AbstractContentType::$templateName
     */
    public $templateName = 'memberListContentType';

    /**
     * @see    \cms\system\content\type\IContentType::getOutput()
     */
    public function getOutput(Content $content)
    {

        $memberList = new MemberList();
        $memberList->setRealm($content->__get('realm'));
        $memberList->setGuild($content->__get('guild'));
        $memberList->setKey($content->__get('key'));
        $memberList->setLocal($content->__get('local'));
        $memberList->setGuildrankPrefix($content->__get('guildrank'));
        $memberList->setMemberBackground($content->__get('memberbackground'));
        $memberList->setRankHeadings($content);
        $memberList->setBackgroundPicture($content->__get('picture'));
        $memberList->setHordeOrAlliance($content->__get('hordeOrAlliance'));
        $memberList->render();
    }
}


/**
 * Class MemberList
 * Basic Member List Class with inline Template. Taken from a refactored PHP Content Type.
 *
 * For a list of possible refactorings check TodoList of Member List Class
 *
 * @todo Move Inline HTML to Template
 * @todo improve Blizard API and implement API Exceptions
 * @todo apply WCF Code Style
 * @todo extract CSS
 * @todo use LESS instead of CSS
 * @todo find useful default Values
 * @todo continue Refactoring
 * @todo move Member List into seperate File !
 *
 * @author Rene Gerritsen <rene.gerritsen@me.com>
 * @package cms\system\content\type
 */
class MemberList
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
    protected $guildrankPrefix = 'A_';
    protected $memberBackground = 'http://bilder.mmorpg-mondklingen.de/bg/A_bg.png';
    protected $backgroundPicture = '';
    protected $hordeOrAlliance;
    /** @var Content */
    protected $rankHeadings;

    /**
     * Constants. Mapping between German Names and Battle.net API ids
     */
    const Krieger = 1;
    const Paladin = 2;
    const Jaeger = 3;
    const Schurke = 4;
    const Priester = 5;
    const Todesritter = 6;
    const Schamane = 7;
    const Magier = 8;
    const Hexenmeister = 9;
    const Moench = 10;
    const Druide = 11;

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
    public function getGuildrankPrefix()
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
     * @param string $guildrankPrefix
     */
    public function setGuildrankPrefix($guildrankPrefix)
    {
        $this->guildrankPrefix = $guildrankPrefix;
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
     * Sets the Rank Headings
     *
     * @param Content $rankHeadings
     */
    public function setRankHeadings($rankHeadings)
    {
        $this->rankHeadings = $rankHeadings;
    }

    /**
     * Get Rank Heading by Id
     *
     * @return array
     */
    public function getRankHeadingById($rankId)
    {
        $rankId++;

        $text = $this->rankHeadings->__get('rank_' . $rankId);
        $isText = $this->rankHeadings->__get('rank_is_image_'. $rankId) == 1;
        $link = '';
        if ($isText) {
            $link = $text;
        }

        $return = array();
        $return['text'] = $text;
        $return['link'] = $link;
        $return['isText'] = $isText;

        return $return;
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
     * Gets the Color of a Class by its Class Index
     *
     * @param integer $classIndex
     *
     * @return string
     */
    function getClassColor($classIndex)
    {
        $color = array(
            static::Krieger => "#C79C63",
            static::Paladin => "#F58CBA",
            static::Jaeger => "#ABD473",
            static::Schurke => "#FFF569",
            static::Priester => "#FFFFFF",
            static::Todesritter => "#C41F3B",
            static::Schamane => "#0070DE",
            static::Magier => "#96CCF0",
            static::Hexenmeister => "#9482C9",
            static::Moench => "#00FF96",
            static::Druide => "#FF7D0A"
        );
        if (!array_key_exists($classIndex, $color)) {
            return $classIndex;
        }

        return $color[$classIndex];
    }

    /**
     * Gets the Special Icon Link by Class Index and Special Name.
     * The Icon is an Images hosted on Webserver
     *
     * @param integer $classIndex
     * @param string $specialName
     *
     * @return string
     */
    function getSpecialIcon($classIndex, $specialName)
    {

        $translate = array(
            static::Krieger => "krieger",
            static::Paladin => "paladin",
            static::Jaeger => "jaeger",
            static::Schurke => "schurke",
            static::Priester => "priester",
            static::Todesritter => "todesritter",
            static::Schamane => "schamane",
            static::Magier => "magier",
            static::Hexenmeister => "hexenmeister",
            static::Moench => "moench",
            static::Druide => "druide"
        );

        $specialName = lcfirst($specialName);
        // Replace German "Umlauts"
        $specialName = str_replace('ä', 'ae', $specialName);
        $specialName = str_replace('ü', 'ue', $specialName);
        $specialName = str_replace('ö', 'oe', $specialName);

        return $this->baseUrl . "/class/thumbnail/special/"
        . $translate[$classIndex]
        . '_'
        . $specialName
        . '.png';
    }

    /**
     * Gets Rank Icon Link by Rank Index
     * The Icon is a Image hosted on BASE_URL Server
     *
     * @param integer $rankIndex
     *
     * @return string
     */
    function getRankIcon($rankIndex)
    {

        return $this->baseUrl . "/class/thumbnail/rank/"
        . $rankIndex
        . '.png';
    }


    /**
     * Gets The Rank Name based on Rank Index
     * !!!! The Rank Name is custom made by Guild Master !!!!
     *
     * @param integer $rankIndex
     *
     * @return string
     */
    function getRankName($rankIndex)
    {
        $rang = array(
            0 => "Gildenleitung",
            1 => "Gildenleitung",
            2 => "Gildenmeister Twink",
            3 => "Gildenrat",
            4 => "Raidleiter",
            5 => "Raidmember",
            6 => "Member",
            7 => "Twink",
            8 => "inaktiv",
            9 => "trial"
        );

        if (!array_key_exists($rankIndex, $rang)) {
            return $rankIndex;
        }

        return $rang[$rankIndex];
    }

    /**
     * Gets Class Name by Class Index
     *
     * @param integer $classIndex
     *
     * @return string
     */
    function getClassName($classIndex)
    {
        $class = array(
            static::Krieger => "Krieger",
            static::Paladin => "Paladin",
            static::Jaeger => "Jäger",
            static::Schurke => "Schurke",
            static::Priester => "Priester",
            static::Todesritter => "Todesritter",
            static::Schamane => "Schamane",
            static::Magier => "Magier",
            static::Hexenmeister => "Hexenmeister",
            static::Moench => "Mönch",
            static::Druide => "Druide"
        );

        if (!array_key_exists($classIndex, $class)) {
            return $classIndex;
        }

        return $class[$classIndex];
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
     * Gets the Role Image Link
     *
     * @param string $role
     *
     * @return string
     */
    function getRoleImage($role)
    {
        return $this->baseUrl . '/class/thumbnail/' . $role . '.gif';
    }


    /**
     * Prints a Member
     *
     * @param string $member
     * @param string $currentRank Call by Refference !!! *
     * @return void
     */
    function printMember($member, &$currentRank)
    {
        $level = $member['character']['level'];
        if ($level <= 10) {
            return;
        }
        if (!isset($member['character']['spec'])) {
            return;
        }

        $name = $member['character']['name'];
        $classId = $member['character']['class'];
        $class = $this->getClassName($classId);
        $color = $this->getClassColor($classId);
        $rankId = $member['rank'];
        $rank = $this->getRankName($rankId);

        $spec = $member['character']['spec']['name'];
        $role = $member['character']['spec']['role'];
        $link = $member['character']['thumbnail'];
        $linkImage = $this->baseUrl . '/class/thumbnail/' . $classId . '.gif';
        $achievementPoints = $member['character']['achievementPoints'];


        $rankHeading = $this->getRankHeadingById($rankId);
        $rankHeadingText = $rankHeading['text'];
        $rankHeaderImageLink = $rankHeading['link'];

        if ($currentRank === null) {
            $currentRank = $rank;
            if ($rankHeading['isText']) {
                echo "<h2>$rankHeadingText</h2>";
            } else {
                echo '<img class="clearfix" src="' . $this->baseUrl . '/class/thumbnail/guildrank/' . $rankHeaderImageLink . '">';
            }
            echo '<div class="clearfix">';

        }

        if ($currentRank !== $rank) {
            echo '</div>';
            if ($rankHeading['isText']) {
                echo "<h2>$rankHeadingText</h2>";
            } else {
                echo '<img class="clearfix" src="' . $this->baseUrl . '/class/thumbnail/guildrank/' . $rankHeaderImageLink . '">';
            }
            echo '<div class="clearfix">';
            $currentRank = $rank;
        }

        ?>
        <div class="member-box hvr-grow"
                <?php if($this->memberBackground === '') { ?>
                     style="background-image: url(<?php echo '/upload/cms/images/wowrooster/background/bg'. $this->getBackgroundPicture() .'.png'; ?>);"
                <?php } else { ?>
                     style="background-image: url(<?php echo $this->getMemberBackground(); ?>);"
                <?php } ?>
            >
            <?php echo $this->renderBoxHeader($color, $name, $rankId); ?>
            <table>
                <tr>
                    <td>
                        <?php echo $this->renderCharImage($link, $linkImage, $role, $classId, $spec); ?>
                    </td>
                    <td>
                        <?php echo $this->getBoxRight($achievementPoints, $name); ?>
                    </td>
                </tr>
            </table>
            <div class="box-footer">
                <div class="level"> <?php echo $level ?></div>
            </div>
        </div>
        <?php
    }

    /**
     * Renders Right side of the Box
     *
     * @param $achievementPoints
     * @param $name
     *
     * @return string
     */
    function getBoxRight($achievementPoints, $name)
    {
        ?>
        <div class="box-right">
            <p class="achievementPoints">
                <img src="<?php echo $this->baseUrl . '/class/thumbnail/erfolgspunkte.png'; ?>">
                <?php echo $achievementPoints; ?> <br>&nbsp;
            </p>

            <p class="hvr-grow">
                <a href="http://eu.battle.net/wow/de/character/blackmoore/<?php echo urldecode($name) ?>/simple">
                    <img src="<?php echo $this->baseUrl; ?>/class/thumbnail/arsenal.png">
                </a>
            </p>
        </div>
        <?php
    }

    /**
     * Renders the Character Image
     *
     * @param string $link
     * @param string $linkImage
     * @param string $role
     * @param string $classId
     * @param string $spec
     * @return string
     * @internal param $rankId
     */
    function renderCharImage($link, $linkImage, $role, $classId, $spec)
    {
        ?>
        <div class="box-image">
            <img src="http://eu.battle.net/static-render/eu/<?php echo $link; ?>">
            <img class="class_thumb" src="<?php echo $linkImage ?>">
            <img class="role_thumb" src="<?php echo $this->getRoleImage($role); ?>">
            <img class="special_thumb" src="<?php echo $this->getSpecialIcon($classId, $spec); ?>">
        </div>
        <?php
    }

    /**
     * Renders Box Header
     *
     * @param string $color
     * @param string $name
     *
     * @return string
     */
    function renderBoxHeader($color, $name, $rankId)
    {
        ?>
        <div class="box-header">
            <img class="rank_thumb" src="<?php echo $this->getRankIcon($rankId); ?>">
            <span class="char_name" style="color:  <?php echo $color; ?>"><?php echo $name; ?></span><br/>
        </div>
        <?php
    }

    /**
     * Request Data From Bilzard and decode to Array
     *
     * @return array
     */
    function getGuildData()
    {
        $data = null;
        $Realm = urlencode($this->realm);
        $Guild = urlencode($this->guild);
        $Key = $this->key;
        $Local = $this->local;
        $Fields = $this->fields;
        $data = @file_get_contents('https://eu.api.battle.net/wow/guild/' . $Realm . '/' . $Guild . '?fields=' . $Fields . '&locale=' . $Local . '&apikey=' . $Key . '');
        $decoded = json_decode($data, true);

        return $decoded;
    }

    /**
     * Renders the List
     */
    public function render()
    {

        $this->renderSytle();

        /**
         * Main Program !
         * This is where the Magic happens.
         * Fetches Guild Data, Sorts Members, by Ranke and displays them by direct output.
         * See Todos Section in Class DOC Block for Information about possible refactorings !
         */

        // Get Data from dev.battle.net Web Service
        // We Requesting Guild List for Mondklingen on Blackmoore
        $decoded = $this->getGuildData();

        $members = $decoded[$this->fields];

        uasort($members, array($this, 'compareByRank'));
        $currentRank = null;

        /**
         * Starts the Output
         */

        // Output Member List
        foreach ($members as $member) {
            $this->printMember($member, $currentRank);
        }
        // Yes its ugly !
        echo '</div>';
    }

    private function renderSytle()
    {
        ?>
        <style>
            /*
           // ------------------------------
           // Import External Style Sheets
           // ------------------------------
           */
            @import url(https://fonts.googleapis.com/css?family=Metal+Mania);

            /*
            // ----------
            // Member Box
            // ----------
            */
            .member-box {
                color: white;
                float: left;
                margin: 1.5em;
                width: 360px;
                padding: 19px;
                border-radius: 8px;
            }

            /*
            // --------------------------
            // Box Image and Char Images
            // --------------------------
            */
            .box-image {
                position: relative;
            }

            .role_thumb {
                height: 32px;
                width: 32px;
                position: absolute;
                top: 25px;
                left: 75px;
            }

            .special_thumb {
                height: 32px;
                width: 32px;
                position: absolute;
                border-radius: 40px;
                top: 60px;
                left: 75px;
            }

            .class_thumb {
                height: 32px;
                width: 32px;
                position: absolute;
                top: -10px;
                left: 75px;
            }

            .rank_thumb {
                height: 32px;
                width: 32px;
                margin-right: 0.5em;
                float: left;
            }

            /*
            // ------------------
            // Box Content Data
            // ------------------
            */

            .box-right {
                margin-left: 2em;
            }

            .char_name {
                font-family: 'Metal Mania', cursive;
                font-size: 24px;
                margin-bottom: -0.25em;
                font-weight: lighter;
                display: block;
            }

            .char_name:first-letter {
                font-weight: bold;
                font-size: 1.3em;
            }

            .level {
                position: absolute;
                left: 30px;
                top: 140px;
                width: 59px;
                height: 64px;
                padding-left: 12px;
                padding-top: 16px;
                font-weight: 900;
                color: white;
                text-shadow: 0px 0px 5px rgba(255, 100, 100, 1);
                font-size: 1.5em;
                background: url(http://bilder.mmorpg-mondklingen.de/bg/lvl_bg.png) no-repeat;
            }

            .achievementPoints {
                font-size: 1.5em;
            }

            /*
            // ------------------
            // Clearfix for simple Responcive Image
            // ------------------
            */
            .clearfix:before, .clearfix:after {
                content: " ";
                display: table
            }

            .clearfix:after {
                clear: both
            }

            /*
            // ----------
            // Animations
            // ----------
            */
            .hvr-grow {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);
                box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -moz-osx-font-smoothing: grayscale;
                -webkit-transition-duration: 0.3s;
                transition-duration: 0.3s;
                -webkit-transition-property: transform;
                transition-property: transform;
            }

            .hvr-grow:hover, .hvr-grow:focus, .hvr-grow:active {
                -webkit-transform: scale(1.1);
                transform: scale(1.1);
            }
        </style>
        <?php
    }
}


?>
