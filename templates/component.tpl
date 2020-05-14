<div id="{$component_name}-div-label">{$form.$component_name.label}</div>
<div id="{$component_name}-div-html">{$form.$component_name.html} <br/>

<script type="text/javascript">
{literal}
CRM.$(function($) {
  var component_name = {/literal}"{$component_name}"{literal};
  var insert_after_id = {/literal}"{$insert_after_id}"{literal};
  $('#' + insert_after_id)
    .closest('tr')
    .after('<tr id="' + component_name + '-tr"><td id="' + component_name + '_label"><span id="' + component_name + '_element"></span></td></tr>');
  $("#" + component_name + "-div-label").prependTo("#" + component_name + "_label");
  $("#" + component_name + "-div-html").appendTo("#" + component_name + "_element");
});
{/literal}
</script>