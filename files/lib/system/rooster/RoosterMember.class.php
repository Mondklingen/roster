<?php

namespace cms\system\rooster;


/**
 * Class RoosterMember
 *
 * Roster Member represents a Single Member for Guild Rooster
 *
 * @package cms\system\rooster
 *
 * @author Rene Gerritsen
 */
class RoosterMember extends RoosterObject
{

    /**
     * Definition of Class by Index
     * @todo Use International Const Names
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

    protected $baseUrl = "http://bilder.mmorpg-mondklingen.de";

    /**
     * Returns the Level of this Char
     *
     * @return string
     */
    public function getLevel()
    {
        $level = $this->data['character']['level'];
        return $level;
    }

    /**
     * Checks if this Character can be Rendered
     *
     * @return boolean
     */
    public function canRender()
    {
        $level = $this->data['character']['level'];
        if ($level <= 10) {
            return false;
        }
        if (!isset($this->data['character']['spec'])) {
            return false;
        }
        return true;
    }

    /**
     * Gets Rank Icon Link by Rank Index
     * The Icon is a Image hosted on BASE_URL Server
     *
     * @todo define Constant for Thumbnail Rank Path
     *
     * @return string
     */
    function getRankIcon()
    {
        $rankIndex = $this->getRankIndex();
        return $this->baseUrl
        . "/class/thumbnail/rank/"
        . $rankIndex
        . '.png';
    }

    /**
     * Gets Character Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->data['character']['name'];
    }

    /**
     * Get Character Color
     *
     * The Color of a Character is mainly based on the Class
     * But is possible to Implement special Colors for extra Conditions e.g. Guild Lead
     *
     * @return string
     */
    public function getColor()
    {
        $classIndex = $this->getClassIndex();

        $color = array(
            static::Krieger       => "#C79C63",
            static::Paladin       => "#F58CBA",
            static::Jaeger        => "#ABD473",
            static::Schurke       => "#FFF569",
            static::Priester      => "#FFFFFF",
            static::Todesritter   => "#C41F3B",
            static::Schamane      => "#0070DE",
            static::Magier        => "#96CCF0",
            static::Hexenmeister  => "#9482C9",
            static::Moench        => "#00FF96",
            static::Druide        => "#FF7D0A"
        );
        if (!array_key_exists($classIndex, $color)) {
            return $classIndex;
        }

        return $color[$classIndex];
    }

    /**
     * Get Member Image
     *
     * Returns the Member Image Link on Blizzard CDN
     *
     * @todo use Getter for CDN URL
     *
     * @return string
     */
    public function getImage()
    {
       return
           "http://eu.battle.net/static-render/eu/"
           . $this->data['character']['thumbnail'];
    }

    /**
     * Get Class Thumbnail Image Link
     *
     * Returns the Image Link for a Class Thumbnail
     *
     * @todo define Constant for Thumbnail Path
     * @todo define Constant for thumbnail Extension
     *
     * @return string
     */
    public function getClassThumb()
    {
        $classIndex = $this->getClassIndex();
        $classThumbImageLink = $this->baseUrl
            . '/class/thumbnail/'
            . $classIndex
            . '.gif';

        return $classThumbImageLink;
    }

    /**
     * Get Role Thumbnail Image Link
     *
     * Returns the Image Link to Special
     *
     * @todo define Constant for Thumbnail Path
     * @todo define Constant for thumbnail Extension
     *
     * @return string
     */
    public function getRoleThumb()
    {
        $role = $this->data['character']['spec']['role'];

        $roleThumbnailImageLink = $this->baseUrl .
            '/class/thumbnail/' .
            $role .
            '.gif';

        return $roleThumbnailImageLink;
    }

    /**
     * Get Special Thumbnail Image Link
     *
     * Returns the Special Icon Link by Class Index and Special Name.
     *
     * @todo define Constant for thumbnail Path
     *
     * @return string
     */
    public function getSpecialThumb()
    {

        $classIndex = $this->getClassIndex();
        $specialName = $this->getSpecialName();

        $translate = array(
            static::Krieger         => "krieger",
            static::Paladin         => "paladin",
            static::Jaeger          => "jaeger",
            static::Schurke         => "schurke",
            static::Priester        => "priester",
            static::Todesritter     => "todesritter",
            static::Schamane        => "schamane",
            static::Magier          => "magier",
            static::Hexenmeister    => "hexenmeister",
            static::Moench          => "moench",
            static::Druide          => "druide"
        );

        $specialName = lcfirst($specialName);
        // Replace German "Umlauts"
        $specialName = str_replace('ä', 'ae', $specialName);
        $specialName = str_replace('ü', 'ue', $specialName);
        $specialName = str_replace('ö', 'oe', $specialName);

        return $this->baseUrl
        . "/class/thumbnail/special/"
        . $translate[$classIndex]
        . '_'
        . $specialName
        . '.png';
    }

    /**
     * Get Achievement Points Image Url
     *
     * @todo Make Image Url a Constant
     * @todo check if Image Url is Required
     *
     * @return string
     */
    public function getAchievementPointsImageUrl()
    {
        return $this->baseUrl . '/class/thumbnail/erfolgspunkte.png';
    }

    /**
     * Get Battle Net Arsenal Image Url
     *
     * @return string
     */
    public function getBattleNetArsenalUrl()
    {
        return $this->baseUrl . '/class/thumbnail/arsenal.png';
    }

    /**
     * Get Achievement Points for this Character
     *
     * @return string
     */
    public function getAchievementPoints()
    {
        $achievementPoints = $this->data['character']['achievementPoints'];
        return $achievementPoints;
    }

    /**
     * Get Battle Net Account Link
     *
     * @todo make Battle Net URL Dynamic
     * @todo make Realm Dynamic
     *
     * @return string
     */
    public function getBattleNetAccountLink()
    {
       return 'http://eu.battle.net/wow/de/character/blackmoore/'
       . urldecode($this->getName())
       . '/simple';
    }

    /**
     * Gets The Rank Name based on Rank Index
     * !!!! The Rank Name is custom made by Guild Master !!!!
     *
     * @return string
     */
    function getRankName()
    {
        $rankIndex = $this->getRankIndex();

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
     * @return string
     */
    function getClassName()
    {
        $classIndex = $this->getClassIndex();

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
     * Gets the Class Index
     *
     * @return string|integer
     */
    private function getClassIndex()
    {
        return $this->data['character']['class'];
    }

    /**
     * Returns the Special Name for a Member
     *
     * @return mixed
     */
    private function getSpecialName()
    {
        return $this->data['character']['spec']['name'];
    }

    /**
     * Returns the Rank Index
     *
     * @return mixed
     */
    public function getRankIndex()
    {
        return $this->data['rank'];
    }

}