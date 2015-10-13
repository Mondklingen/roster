<?php

namespace cms\system\rooster;

/**
 * Class GuildRank
 *
 * @author Rene Gerritsen <rene.gerritsen@me.com>
 * @package cms\system\rooster
 */
class GuildRank extends RoosterCollection
{

    /**
     * Guild Rank Index
     *
     * @var integer
     */
    protected $index;

    /**
     * Name of This Rank
     *
     * @var  string
     */
    protected $name;
    /**
     * Image of this Rank
     *
     * @var  string
     */
    protected $image;

    /**
     * Indicates if this Rank is a Link or a Text
     *
     * @var boolean
     */
    protected $isText;

    /**
     * Base Url
     *
     * @var string
     */
    protected $baseUrl = 'http://bilder.mmorpg-mondklingen.de';


    /**
     * Gets Rank Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage()
    {
        if (!$this->isIsText()) {
            return
                $this->baseUrl .
                '/class/thumbnail/guildrank/' .
                $this->name .
                '.png';
        }
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param int $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @return boolean
     */
    public function isIsText()
    {
        return $this->isText;
    }

    /**
     * @param boolean $isText
     */
    public function setIsText($isText)
    {
        $this->isText = $isText;
    }

}