<div id="help">
  {ts}Rules for Facebook Pixels can be defined here, to determine which Facebook Pixel events will be invoked at various stages of the Event and Contribution workflow.{/ts}
</div>

{if $rows}
  <div id="fbpixel-rule-list">
    {strip}
      {* handle enable/disable actions *}
      {include file="CRM/common/enableDisableApi.tpl"}
      {include file="CRM/common/jsortable.tpl"}
      <table id="options" class="display">
        <thead>
        <tr>
          <th id="sortable">{ts}Entity{/ts}</th>
          <th>{ts}Page{/ts}</th>
          <th>{ts}Event{/ts}</th>
          <th>{ts}Params{/ts}</th>
          <th></th>
        </tr>
        </thead>
        {foreach from=$rows item=row}
          <tr id="fbpixel_rule-{$row.id}" class="crm-entity {$row.class}{if NOT $row.is_active} disabled{/if}">
            <td class="crm-fbpixel-rule">{$row.entity}</td>
            <td>{$row.page}</td>
            <td>{$row.event}</td>
            <td>{$row.params|truncate:20:'...'}</td>
            <td>{$row.action|replace:'xx':$row.id}</td>
          </tr>
        {/foreach}
      </table>
    {/strip}
  </div>
{else}
  <div class="messages status no-popup">
    <div class="icon inform-icon"></div>
    {ts}There are no Fbpixel Rules.{/ts}
  </div>
{/if}

<div class="action-link">
  <a href='{crmURL p='civicrm/cividiscount/discount/add' q="reset=1"}' id="newDiscountCode"
     class="button"><span class="icon ui-icon-circle-plus"></span> {ts}New Fbpixel Rule{/ts}</a>
</div>
