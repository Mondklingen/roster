{foreach from=$ranks item=rank}
    {if $rank->isIsText()}
        <h2>{$rank.name}</h2>
    {else}
        <img class="clearfix" src="{$rank.image}">
    {/if}
    {foreach from=$rank.members item=member}
        {if $member.canRender}
            <div class="member-box hvr-grow"
                    {if $memberList.memberBackground === ''}
                         style="background-image: url('{$memberList.backgroundPicture}')"
                    {else}
                         style="background-image: url({$memberList.memberBackground})"
                    {/if}
                >
                <div class="box-header">
                    <img class="rank_thumb" src="{$member.rankIcon}">
                    <span class="char_name" style="color: {$member.color}">{$member.name}</span><br/>
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
                    <div class="level" style="background: url({$memberList.fractionBackground}) no-repeat;"> {$member.level}</div>
                </div>
            </div>
        {/if}
    {/foreach}
    <div class="clearfix"></div>
{/foreach}
