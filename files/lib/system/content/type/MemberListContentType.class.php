<?php
namespace cms\system\content\type;

use cms\data\content\Content;
use cms\system\rooster\MemberList;
use wcf\system\WCF;

/**
 * Member List Content Type
 *
 * This Content Type adds a Member List to possible Content Types for Code Quake CMS for WCF
 *
 * WARING: This is a Alpha Version !
 * ---------------------------------
 * Use this Extension only if u know what your doing !
 *
 * @version 0.1.2 Alpha !
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

        $memberList = new MemberList(array());
        $memberList->setRealm($content->__get('realm'));
        $memberList->setGuild($content->__get('guild'));
        $memberList->setKey($content->__get('key'));
        $memberList->setLocal($content->__get('local'));
        $memberList->setGuildRankPrefix($content->__get('guildrank'));
        $memberList->setMemberBackground($content->__get('memberbackground'));
        $memberList->setRankHeadings($content);
        $memberList->setBackgroundPicture($content->__get('picture'));
        $memberList->setHordeOrAlliance($content->__get('hordeOrAlliance'));
        return $memberList->render();

    }
}
