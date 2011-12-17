{extends file=$BASE_TEMPLATE_NAME}

{block name=title}Server error{/block}
{block name=description}{/block}
{block name=nav}{$smarty.block.parent}{/block}

{block name=content}
    <h1>Server error</h1>
    <p>A server error occured while trying to load your page.</p>
{/block}

{block name=sidebar}{$smarty.block.parent}{/block}
{block name=footer}{$smarty.block.parent}{/block}

{block name=additional_scripts}{$smarty.block.parent}{/block}
{block name=additional_styles}{$smarty.block.parent}{/block}
