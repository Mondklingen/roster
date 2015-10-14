<dl>
    <dt>
        <label for="realm">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.realm{/lang}
        </label>
    </dt>
    <dd>
        <input id="realm" name="contentData[realm]" value="{if $contentData['realm']|isset}{$contentData['realm']}{/if}"/>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.realm_description{/lang}</p>
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
                {if $contentData['local']|isset && $contentData['local']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_de{/lang}
            </option>
            <option
                value="2"
                {if $contentData['local']|isset && $contentData['local']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_en{/lang}
            </option>
            <option
                value="3"
                {if $contentData['local']|isset && $contentData['local']=='3'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_fr{/lang}
            </option>
            <option
                value="4"
                {if $contentData['local']|isset && $contentData['local']=='4'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_es{/lang}
            </option>
            <option
                value="5"
                {if $contentData['local']|isset && $contentData['local']=='5'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_ru{/lang}
            </option>
            <option
                value="6"
                {if $contentData['local']|isset && $contentData['local']=='6'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_it{/lang}
            </option>
        </select>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.local_description{/lang}</p>
    </dd>

    <dt>
        <label for="hordeOrAlliance">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction{/lang}
        </label>
    </dt>
    <dd>
        <select id="hordeOrAlliance" name="contentData[hordeOrAlliance]">
            <option
                value="1"
                {if $contentData['hordeOrAlliance']|isset && $contentData['hordeOrAlliance']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_horde{/lang}
            </option>
            <option
                value="2"
                {if $contentData['hordeOrAlliance']|isset && $contentData['hordeOrAlliance']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_alliance{/lang}
            </option>
        </select>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.fraction_description{/lang}</p>
    </dd>

    <dt>
        <label>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.ranks{/lang}</label>
    </dt>

    <dt>
        <label for="rank_1">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.1{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_1" name="contentData[rank_1]" value="{if $contentData['rank_1']|isset}{$contentData['rank_1']}{/if}"/>
        <select id="rank_1_is_image" name="contentData[rank_is_image_1]">
            <option
                value="1"
                {if $contentData['rank_is_image_1']|isset && $contentData['rank_is_image_1']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_1']|isset && $contentData['rank_is_image_1']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_2">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.2{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_2" name="contentData[rank_2]" value="{if $contentData['rank_2']|isset}{$contentData['rank_2']}{/if}"/>
        <select id="rank_2_is_image" name="contentData[rank_is_image_2]">
            <option
                value="1"
                {if $contentData['rank_is_image_2']|isset && $contentData['rank_is_image_2']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_2']|isset && $contentData['rank_is_image_2']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_3">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.3{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_3" name="contentData[rank_3]" value="{if $contentData['rank_3']|isset}{$contentData['rank_3']}{/if}"/>
        <select id="rank_3_is_image" name="contentData[rank_is_image_3]">
            <option
                value="1"
                {if $contentData['rank_is_image_3']|isset && $contentData['rank_is_image_3']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_3']|isset && $contentData['rank_is_image_3']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_4">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.4{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_4" name="contentData[rank_4]" value="{if $contentData['rank_4']|isset}{$contentData['rank_4']}{/if}"/>
        <select id="rank_4_is_image" name="contentData[rank_is_image_4]">
            <option
                value="1"
                {if $contentData['rank_is_image_4']|isset && $contentData['rank_is_image_4']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_4']|isset && $contentData['rank_is_image_4']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_5">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.5{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_5" name="contentData[rank_5]" value="{if $contentData['rank_5']|isset}{$contentData['rank_5']}{/if}"/>
        <select id="rank_5_is_image" name="contentData[rank_is_image_5]">
            <option
                value="1"
                {if $contentData['rank_is_image_5']|isset && $contentData['rank_is_image_5']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_5']|isset && $contentData['rank_is_image_5']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_6">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.6{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_6" name="contentData[rank_6]" value="{if $contentData['rank_6']|isset}{$contentData['rank_6']}{/if}"/>
        <select id="rank_6_is_image" name="contentData[rank_is_image_6]">
            <option
                value="1"
                {if $contentData['rank_is_image_6']|isset && $contentData['rank_is_image_6']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_6']|isset && $contentData['rank_is_image_6']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_7">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.7{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_7" name="contentData[rank_7]" value="{if $contentData['rank_7']|isset}{$contentData['rank_7']}{/if}"/>
        <select id="rank_7_is_image" name="contentData[rank_is_image_7]">
            <option
                value="1"
                {if $contentData['rank_is_image_7']|isset && $contentData['rank_is_image_7']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_7']|isset && $contentData['rank_is_image_7']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_8">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.8{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_8" name="contentData[rank_8]" value="{if $contentData['rank_8']|isset}{$contentData['rank_8']}{/if}"/>
        <select id="rank_8_is_image" name="contentData[rank_is_image_8]">
            <option
                value="1"
                {if $contentData['rank_is_image_8']|isset && $contentData['rank_is_image_8']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_8']|isset && $contentData['rank_is_image_8']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_9">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.9{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_9" name="contentData[rank_9]" value="{if $contentData['rank_9']|isset}{$contentData['rank_9']}{/if}"/>
        <select id="rank_9_is_image" name="contentData[rank_is_image_9]">
            <option
                value="1"
                {if $contentData['rank_is_image_9']|isset && $contentData['rank_is_image_9']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_9']|isset && $contentData['rank_is_image_9']=='2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for="rank_10">
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.rank.10{/lang}
        </label>
    </dt>
    <dd>
        <input id="rank_10" name="contentData[rank_10]" value="{if $contentData['rank_10']|isset}{$contentData['rank_10']}{/if}"/>
        <select id="rank_10_is_image" name="contentData[rank_is_image_10]">
            <option
                value="1"
                {if $contentData['rank_is_image_10']|isset && $contentData['rank_is_image_10']=='1'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_yes{/lang}
            </option>
            <option
                value="2"
                {if $contentData['rank_is_image_10']|isset && $contentData['rank_is_image_10'] == '2'}selected=selected{/if}
            >
                {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.isimage_no{/lang}
            </option>
        </select>
    </dd>

    <dt>
        <label for=memberbackground>
            {lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.memberbackground{/lang}
        </label>
    </dt>

    <dd>
        <p>{lang}cms.acp.content.type.herolist.phoenix-plugins.de.input.memberbackground_description{/lang}</p>
        <fieldset class="member-bg-images">
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==1}checked{/if}{/if} id="picture_1" name="contentData[picture]" value="1"><label for="picture_1"> <img src="/upload/cms/images/wowrooster/background/bg1.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==2}checked{/if}{/if} id="picture_2" name="contentData[picture]" value="2"><label for="picture_2"> <img src="/upload/cms/images/wowrooster/background/bg2.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==3}checked{/if}{/if} id="picture_3" name="contentData[picture]" value="3"><label for="picture_3"> <img src="/upload/cms/images/wowrooster/background/bg3.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==4}checked{/if}{/if} id="picture_4" name="contentData[picture]" value="4"><label for="picture_4"> <img src="/upload/cms/images/wowrooster/background/bg4.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==5}checked{/if}{/if} id="picture_5" name="contentData[picture]" value="5"><label for="picture_5"> <img src="/upload/cms/images/wowrooster/background/bg5.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==6}checked{/if}{/if} id="picture_6" name="contentData[picture]" value="6"><label for="picture_6"> <img src="/upload/cms/images/wowrooster/background/bg6.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==7}checked{/if}{/if} id="picture_7" name="contentData[picture]" value="7"><label for="picture_7"> <img src="/upload/cms/images/wowrooster/background/bg7.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==8}checked{/if}{/if} id="picture_8" name="contentData[picture]" value="8"><label for="picture_8"> <img src="/upload/cms/images/wowrooster/background/bg8.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==9}checked{/if}{/if} id="picture_9" name="contentData[picture]" value="9"><label for="picture_9"> <img src="/upload/cms/images/wowrooster/background/bg9.png"></label>
            <input type="radio" {if $contentData['picture']|isset}{if $contentData['picture']==10}checked{/if}{/if} id="picture_10" name="contentData[picture]" value="10"><label for="picture_10"> <img src="/upload/cms/images/wowrooster/background/bg10.png"></label>
        </fieldset>
        <p>Custom Background</p>
        <input id="memberbackground" name="contentData[memberbackground]" value="{if $contentData['memberbackground']|isset}{$contentData['memberbackground']}{/if}"/>
    </dd>
</dl>
