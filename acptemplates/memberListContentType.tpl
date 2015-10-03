<dl>
    <dt>
        <label for="realm">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.realm{/lang}
        </label>
    </dt>
    <dd>
        <input id="realm" name="contentData[realm]" value="{if $contentData['realm']|isset}{$contentData['realm']}{/if}"/>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.guild{/lang}</p>
    </dd>

    <dt>
        <label for=guild>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.guild{/lang}
        </label>
    </dt>
    <dd>
        <input id="guild" name="contentData[guild]" value="{if $contentData['guild']|isset}{$contentData['guild']}{/if}"/>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.guild_description{/lang}</p>
    </dd>

    <dt>
        <label for=key>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.key{/lang}
        </label>
    </dt>
    <dd>
        <input id="key" name="contentData[key]" value="{if $contentData['key']|isset}{$contentData['key']}{/if}"/>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.key_description1{/lang}</p>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.key_description2{/lang}</p>
    </dd>

    <dt>
        <label for=local>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local{/lang}
        </label>
    </dt>
    <dd>
        <select id="local" name="contentData[local]">
            <option
                value="1"
                {if $contentData['local']|isset && $content['local']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_de{/lang}
            </option>
            <option
                value="2"
                {if $contentData['local']|isset && $content['local']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_en{/lang}
            </option>
            <option
                value="3"
                {if $contentData['local']|isset && $content['local']=='3'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_fr{/lang}
            </option>
            <option
                value="4"
                {if $contentData['local']|isset && $content['local']=='4'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_es{/lang}
            </option>
            <option
                value="5"
                {if $contentData['local']|isset && $content['local']=='5'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_ru{/lang}
            </option>
            <option
                value="6"
                {if $contentData['local']|isset && $content['local']=='6'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_it{/lang}
            </option>
        </select>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_description{/lang}</p>
    </dd>

<!--  hordeOrAlliance -->

        <dt>
        <label for="hordeOrAlliance">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction{/lang}
        </label>
    </dt>
    <dd>
        <select id="hordeOrAlliance" name="contentData[hordeOrAlliance]">
            <option
                value="1"
                {if $contentData['hordeOrAlliance']|isset && $content['hordeOrAlliance']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_horde{/lang}
            </option>
            <option
                value="2"
                {if $contentData['hordeOrAlliance']|isset && $content['hordeOrAlliance']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_alliance{/lang}
            </option>
        </select>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_description{/lang}</p>
    </dd>


    <dt>
        <label for=guildrank>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.guildrank{/lang}
        </label>
    </dt>
    <dd>
        <input id="guildrank" name="contentData[guildrank]" value="{if $contentData['guildrank']|isset}{$contentData['guildrank']}{/if}"/>
    </dd>

    <dt>
        <label for=memberbackground>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.memberbackground{/lang}
        </label>
    </dt>
    <dd>
        <input id="memberbackground" name="contentData[memberbackground]" value="{if $contentData['memberbackground']|isset}{$contentData['memberbackground']}{/if}"/>
    </dd>
</dl>
