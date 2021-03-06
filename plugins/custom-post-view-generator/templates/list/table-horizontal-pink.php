<style type="text/css">
	/* TEMPLATE CSS */
	.cpvg-table{ margin-top:10px; border: 1px solid #D211D1; border-collapse: collapse; }
	.cpvg-table td { border: 1px solid #D211D1; padding: 2px;	}
	.cpvg-table th { border: 1px solid #D211D1; background-color: #FF54FF; padding: 2px; color: #FFFFFF; }
	.cpvg-table td ul { }
	.cpvg-table .cpvg-table-blank{ border-left: 1px solid #FFFFFF; border-right: 1px solid #FFFFFF; }
	.cpvg-page{ border: 1px solid #D211D1; margin: 10px; }
	
	/* PAGINATION CSS */
	.pager{ font-family: "Bitstream Cyberbit","MS Georgia","Times New Roman",Bodoni,Garamond,"Minion Web","ITC Stone Serif","Helvetica";height: 32px;padding: 0;margin: 0;padding-top: 5px;padding-left: 3px; }
	.pager div.short{ float: right;margin:0 0 10px 0;padding: 0;margin-right: 10px;width: 74px; }
	.pager div.short input{ width: 28px;height: 20px;border: none;float: left; }
	.pager ul{ list-style: none;padding: 0;margin: 0;float: left;margin-right: 4px; }
	.pager ul li{ display: inline;margin-left: 2px; }
	.pager ul li a.normal{ text-decoration: none;display: inline-table;width: 20px;height: 20px;text-align: center; }
	.pager span{ margin-left: 4px;float: left; }
	.pager .btn{ display: block;text-align: center;float: left;padding: 0;margin: 0;margin-left: 4px;cursor: pointer; }
	.pager.themecolor .btn{ height: 24px; }
	.pager ul li a.active{ text-decoration: none;display: inline-table;width: 20px;height: 20px;text-align: center; }

	/* PAGINATION THEME CSS */
	.themecolor{ background-color: #FF54FF;border: 1px solid #D211D1; }
	.themecolor.normal{ background-color: #F01EF0;color: White;border: solid 1px #D211D1; }
	.themecolor.active{ background-color: #C107C1;color: White;border: solid 1px #D211D1; }
	.pager.themecolor .btn{ height:27px; background-color: #F01EF0;color: White;border: solid 1px #D211D1; }

    /* SORTER CSS */
    table.cpvg-table thead tr .header {	background-image: url(<?php echo CPVG_PLUGIN_URL.'libs/tablesorter/bg.gif'; ?>); background-repeat: no-repeat; background-position: center right; cursor: pointer; }
    table.cpvg-table thead tr .headerSortUp { background-image: url(<?php echo CPVG_PLUGIN_URL.'libs/tablesorter/asc.gif'; ?>); }
    table.cpvg-table thead tr .headerSortDown {	background-image: url(<?php echo CPVG_PLUGIN_URL.'libs/tablesorter/desc.gif'; ?>); }

    /* SORTER THEME CSS */
    table.cpvg-table tbody tr.odd td { background-color:#F0F0F6; }
    table.cpvg-table thead tr .headerSortDown, table.cpvg-table thead tr .headerSortUp { background-color: #FF54FF; }	
</style>

<script type='text/javascript'>
jQuery(document).ready(function(){
	<?php if(isset($pagination)){ ?>
		jQuery('#cpvg-paginator').smartpaginator({ totalrecords: <?php echo count($records_data); ?>, 
												    recordsperpage: <?php echo $pagination; ?>,
												    datacontainer: 'cpvg-records',
												    dataelement: 'tr' }); 
	<?php } ?>
    <?php if(isset($usersorting)){ if($usersorting == 'usersorting_enabled'){ ?>
    	jQuery(".cpvg-table").tablesorter();    
    <?php }} ?>		
});
</script>

<?php
	if(isset($records_data[0])){	
		//PAGINATION DIV
		echo "<div id='cpvg-paginator'></div>";
		
		//RECORDS TABLE HEAD
		echo "<table id='cpvg-records' class='cpvg-table'>\n";
		echo "<thead><tr>\n";
		foreach($records_data[0] as $record){
			echo "<th>".$record['label']."</th>";
		}
		echo "</tr></thead>\n";
		
		//RECORDS TABLE RECORDS
		echo "<tbody>";			
		foreach($records_data as $record_index => $record_data){
			echo "<tr>";
			foreach($record_data as $record_idx => $record_data){
				echo "<td>".$record_data['value']."</td>";
			}
			echo "</tr>";
		}
		echo "</tbody></table>";										
	}						
?>
