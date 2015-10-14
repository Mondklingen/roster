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
        if (!$this->isIsText() && $this->name !== '') {
            return $this->name;
        }
        return 'data:image/gif;base64,R0lGOD lhCwAOAMQfAP////7+/vj4+Hh4eHd3d/v7+/Dw8HV1dfLy8ubm5vX19e3t7fr 6+nl5edra2nZ2dnx8fMHBwYODg/b29np6eujo6JGRkeHh4eTk5LCwsN3d3dfX 13Jycp2dnevr6////yH5BAEAAB8ALAAAAAALAA4AAAVq4NFw1DNAX/o9imAsB tKpxKRd1+YEWUoIiUoiEWEAApIDMLGoRCyWiKThenkwDgeGMiggDLEXQkDoTh CKNLpQDgjeAsY7MHgECgx8YR8oHwNHfwADBACGh4EDA4iGAYAEBAcQIg0Dk gcEIQA7';
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