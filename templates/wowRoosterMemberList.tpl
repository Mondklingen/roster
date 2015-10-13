{foreach from=$members item=member}
    {if $member.canRender}
        <div class="member-box hvr-grow"
                {if $this->memberBackground === ''}
                     style="background-image: url({'/upload/cms/images/wowrooster/background/bg'. $this->getBackgroundPicture() .'.png';});"
                {else}
                     style="background-image: url({$this->getMemberBackground()});"
                {/if}
            >
            <div class="box-header">
                <img class="rank_thumb" src="{$member.rankIcon}">
                <span class="char_name" style="color: {$member.color}"><?php echo $name; ?></span><br/>
            </div>
            <table>
                <tr>
                    <td>
                        <div class="box-image">
                            <img src="{$member.image}">
                            <img class="class_thumb" src="{$member.classThumb}">
                            <img class="role_thumb" src="{$member.roleThumb}">
                            <img class="special_thumb" src="{$member.specialThumb}">
                        </div>
                    </td>
                    <td>
                        <div class="box-right">
                            <p class="achievementPoints">
                                <img src="{$member.achievementPointsImageUrl}">
                                {$member.achievementPoints}<br>&nbsp;
                            </p>

                            <p class="hvr-grow">
                                <a href="{$member.battleNetAccountLink}">
                                    <img src="{$member.battleNetArsenalUrl}">
                                </a>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="box-footer">
                <div class="level"> {$member.level}</div>
            </div>
        </div>
    {/if}
{/foreach}