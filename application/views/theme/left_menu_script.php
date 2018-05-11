<!-- /.navbar-static-side -->
<script>
objects = <?php echo json_encode($this->session->menu)?>;
exist = [];

$( document ).ready(function() {
  construct_menu();
});
</script>

<script>
function construct_menu(search=null){
  //<first level>
if(objects != null){
  $.each(objects,function(key,value){
    if(value.parent_id == 0){

      exist.push(value.id);

      var html =
      '<li id="li_' + value.id + '" >'
      + '<a id="a_' + value.id + '" href="<?php echo base_url()?>' + value.href  + '"><i class="' + value.icon + '"></i> '
      + value.label
      + '</a>'
      + '</li>';

      $("#side-menu").append(html);
    }


  });

  //</first level>
  //<others level>

  var  i = exist.length;
  if(i > 0){

    while (i < objects.length) {

      $.each(objects,function(key,value){

        var parent_html = $("#li_" + value.parent_id).html();
        var this_html = $("#li_" + value.id).html();
        if( value.parent_id > 0 && parent_html !== undefined && this_html === undefined ){

          padding_left = $("#a_" + value.parent_id ).css("padding-left");
          padding_left = parseInt(padding_left.replace("px", ""));
          var new_padding_left = padding_left + 20;

          var child_html =
          '<li id="li_' + value.id +'">'
          +'<a id="a_' + value.id + '" href="<?php echo base_url()?>' + value.href + '" style="padding-left:' + new_padding_left + 'px" ><i class="' + value.icon + '"></i> ' + value.label + '</a>'
          +'</li>';

          if($("#ul_" + value.parent_id ).html() == undefined){
            $("#a_" + value.parent_id ).removeAttr("href");
            $("#a_" + value.parent_id ).append('<span class="fa arrow"></span>');
            $("#li_" + value.parent_id).append('<ul id="ul_' + value.parent_id + '" class="nav nav-second-level"></ul>');
          }
          $("#ul_" + value.parent_id ).append(child_html);

          i++;
        }
      });
    }
  }
  //</others levels>
}
}
</script>
