
	<!-- Page content -->
        <script type="text/javascript">
        $(document).ready(function(){
            
            $('div.page-content').scrollspy({ target: '.sidebar' });
         
         
    
         
        })
        

        </script>
        
        
                                                            <style>
                                                                /* General table styling */
table.checksform {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 9px;
    
}


table.checksform , th, td {
    border: 1px solid #d0d7de; 
}


table.checksform > thead > tr:not(:first-child) > th {
    background-color: #e0e6f8;
    color: #333;
    font-weight: bold;
    text-align: center;
}


table.checksform>tbody td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}
table.checksform>thead td {
    padding: 8px;
    text-align: center; 
    vertical-align: middle;
}


table.checksform>tbody tr:nth-child(even) {
    background-color: #f9fafb;
}


table.checksform>tbody tr:hover {
    background-color: #f0f6ff;
}


table.checksform>tbody td.numeric {
    text-align: right;
}


table.checksform>thead>tr:first-child>th {
border: 1px solid #d0d7de; 
text-align: center;
padding:8px;
}
table.checksform > thead tr:nth-child(2) th {
    font-size: 16px;
    background-color: #d3d3d3;
    text-align: center;
}


table.checksform > thead > tr:not(:first-child)>th[rowspan] {
    vertical-align: middle;
}


table.checksform>tbody td.total {
    font-weight: bold;
    background-color: #eef2ff; 
}


table.checksform>tbody>tr>td.selected {
    background-color: #cce5ff;
    border: 2px solid #007bff;
}


                                                            </style>
	<div class="page-content "   data-spy="scroll" data-target=".sidebar" >

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
                  
			<div class="content " >
                            

				<!-- Inner container -->
				<div class="d-flex w-md-auto align-items-start flex-column flex-md-row" >

				
                                    <div class="order-2 order-md-2 col" >


						
						<!-- Sticky -->
                                                <div class="card  " id="profileinfo">
							<div class="card-header header-elements-inline">
								<h5 class="card-title" >
                                                                    SUC NF Forms B
                                                                    
                                                                    <?php 
                                                                       if ($check_dbrowdata->status === "PENDING") {
                                                                    echo "<b class=bg-primary>FOR VALIDATION</b>";
                                                                } else if ($check_dbrowdata->status === "DISAPPROVED") {
                                                                    echo "<b class=bg-danger>SUBJECT FOR RESUBMISSION</b>";
                                                                } else if ($check_dbrowdata->status === "APPROVED") {
                                                                   echo "<b class=bg-success>VALIDATED</b>";
                                                                }
                                                                    
                                                                    ?>
                                                                    
                                                                </h5> 
								
                                                                      <div class="btn-group">
			                    	<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left dropdown-toggle" data-toggle="dropdown"><b><i class="icon-list-unordered"></i></b> Action</button>
			                    	<div class="dropdown-menu dropdown-menu-right">
										<a href="#" data-toggle="modal" data-target="#modal_validateconsolidate" class="dropdown-item"><i class="icon-stack-check"></i> Consolidate and Mark as Validated</a>
										<a href="#" data-toggle="modal" data-target="#modal_reject"  class="dropdown-item"><i class="icon-warning22"></i> Request for Resubmission</a>
                                                                                <a href="<?= base_url().'eform/'. urlencode(base64_encode($check_dbrowdata->uploaded_file)) ?>" target="_blank"  class="dropdown-item"><i class="icon-download"></i> Download Form</a>
										
									</div>
								</div>
                                                                        
                                                         
                                                                
							</div>

							<div class="card-body">
                                                            
                                                   
                                                                   
                                                            <h6 id ='heiname'> 
                                                                  
                                                                </h6>
                                                              
                                                                    <script>
                                                                                        $(document).ready(function(){
                                                                                            $.getJSON(site_url()+'Hei/hei_jsondata/' + <?= $check_dbrowdata->instcode ?>, function(data){
                                                                                              $("#heiname").text(data[0].instname)
                                                                                            })
                                                                                        });
                                                                    </script>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
							<div  class="col-12 overflow-auto border-1 "  style="overflow: auto; height: 700px ; width: 1500px;">
                                                            
                                                   
                                                        

    
    <table class="checksform" >
        <thead >
             <tr>
            <th colspan="1" rowspan="1"></th>
            <th  colspan="1" rowspan="1">A</th>
            <th  colspan="1" rowspan="1">B</th>
            <th  colspan="1" rowspan="1">C</th>
            <th  colspan="1" rowspan="1">D</th>
            <th  colspan="1" rowspan="1">E</th>
            <th  colspan="1" rowspan="1">F</th>
            <th  colspan="1" rowspan="1">G</th>
            <th  colspan="1" rowspan="1">H</th>
            <th  colspan="1" rowspan="1">I</th>
            <th  colspan="1" rowspan="1">J</th>
            <th  colspan="1" rowspan="1">K</th>
            <th  colspan="1" rowspan="1">L</th>
            <th  colspan="1" rowspan="1">M</th>
            <th  colspan="1" rowspan="1">N</th>
            <th  colspan="1" rowspan="1">O</th>
            <th  colspan="1" rowspan="1">P</th>
            <th  colspan="1" rowspan="1">Q</th>
            <th  colspan="1" rowspan="1">R</th>
            <th  colspan="1" rowspan="1">S</th>
            <th  colspan="1" rowspan="1">T</th>
            <th  colspan="1" rowspan="1">U</th>
            <th  colspan="1" rowspan="1">V</th>
            <th  colspan="1" rowspan="1">W</th>
            <th  colspan="1" rowspan="1">X</th>
            <th  colspan="1" rowspan="1">Y</th>
            <th  colspan="1" rowspan="1">Z</th>
            <th  colspan="1" rowspan="1">AA</th>
            <th  colspan="1" rowspan="1">AB</th>
            <th  colspan="1" rowspan="1">AC</th>
            <th  colspan="1" rowspan="1">AD</th>
            <th  colspan="1" rowspan="1">AE</th>
            <th  colspan="1" rowspan="1">AF</th>
            <th  colspan="1" rowspan="1">AG</th>
            <th  colspan="1" rowspan="1">AH</th>
            <th  colspan="1" rowspan="1">AI</th>
            <th  colspan="1" rowspan="1">AJ</th>
            <th  colspan="1" rowspan="1">AK</th>
            <th  colspan="1" rowspan="1">AL</th>
            <th  colspan="1" rowspan="1">AM</th>
            <th  colspan="1" rowspan="1">AN</th>
            <th  colspan="1" rowspan="1">AO</th>
            <th  colspan="1" rowspan="1">AP</th>
            <th  colspan="1" rowspan="1">AQ</th>
            <th  colspan="1" rowspan="1">AR</th>
            <th  colspan="1" rowspan="1">AS</th>
            <th  colspan="1" rowspan="1">AT</th>
            <th  colspan="1" rowspan="1">AU</th>
            <th  colspan="1" rowspan="1">AV</th>
            
            </tr>
        <tr >
             <td colspan="1" rowspan="1">1</td>
             <td colspan="1" rowspan="1"></td>
            <th colspan="47"><?= $form_values[0]['B']?></th>
        </tr>
     <tr>
          <td colspan="1" rowspan="1">2</td>
         <?php 
         for($i =1;$i<=48;$i++){
            echo '<th colspan="1" rowspan="1"></th>';
         }
                    ?>
            </tr>
     <tr>
         <td colspan="1" rowspan="1">3</td>
    <th colspan="1" rowspan="1"><?= $form_values[2]['A']?></th>
    <th colspan="2" rowspan="1"><?= $form_values[2]['B']?></th>
    <th colspan="2" rowspan="1"><?= $form_values[2]['D']?></th>
    <th colspan="3" rowspan="1"><?= $form_values[2]['F']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['I']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['J']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['K']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['L']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['M']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['N']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['O']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['P']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['Q']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['R']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['S']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['T']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['U']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['V']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['W']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['X']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['Y']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['Z']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AA']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AB']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AC']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AD']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AE']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AF']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AG']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AH']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AI']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AJ']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AK']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AL']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AM']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AN']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AO']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AP']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AQ']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AR']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AS']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AT']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AU']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[2]['AV']?></th>
    
  
            </tr>
     <tr>
         <td colspan="1" rowspan="1">4</td>
    <th colspan="1" rowspan="4"><?= $form_values[3]['A']?></th>
    <th colspan="2" rowspan="2"><?= $form_values[3]['B']?></th>
    <th colspan="2" rowspan="2"><?= $form_values[3]['D']?></th>
    <th colspan="3" rowspan="2"><?= $form_values[3]['F']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['I']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['J']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['K']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['L']?></th>
    <th colspan="3" rowspan="2"><?= $form_values[3]['M']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['P']?></th>
    <th colspan="1" rowspan="4"><?= $form_values[3]['Q']?></th>
    <th colspan="19" rowspan="1"><?= $form_values[3]['R']?></th>
    <th colspan="3" rowspan="1"><?= $form_values[3]['AK']?></th>
    <th colspan="3" rowspan="1"><?= $form_values[3]['AN']?></th>
    <th colspan="2" rowspan="1"><?= $form_values[3]['AQ']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[3]['AS']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[3]['AT']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[3]['AU']?></th>
    <th colspan="1" rowspan="1"><?= $form_values[3]['AV']?></th>

    
  
            </tr>
     <tr>
         <td colspan="1" rowspan="1">5</td>
         <th colspan="2" rowspan="1"><?= $form_values[4]['R']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['T']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['V']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['X']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['Z']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['AB']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['AD']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['AF']?></th>
         <th colspan="2" rowspan="1"><?= $form_values[4]['AH']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AJ']?></th>
         <th colspan="3" rowspan="1"><?= $form_values[4]['AK']?></th>
         <th colspan="3" rowspan="1"><?= $form_values[4]['AN']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AQ']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AR']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AS']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AT']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AU']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[4]['AV']?></th>

    
  
            </tr>
     <tr>
         <td colspan="1" rowspan="1">6</td>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>
         <th colspan="1" rowspan="1"></th>

    
  
            </tr>
             <tr>
         <td colspan="1" rowspan="1">7</td>
         <th colspan="1" rowspan="1"><?= $form_values[6]['B']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['C']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['D']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['E']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['F']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['G']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['H']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['M']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['N']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['O']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['R']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['S']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['T']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['U']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['V']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['W']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['X']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['Y']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['Z']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AA']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AB']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AC']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AD']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AE']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AF']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AG']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AH']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AI']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AJ']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AK']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AL']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AM']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AN']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AO']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AP']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AQ']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AR']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AS']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AT']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AU']?></th>
         <th colspan="1" rowspan="1"><?= $form_values[6]['AV']?></th>
  

    
  
            </tr>
             <tr>
            <td colspan="1" rowspan="1">8-11</td>
            <th colspan="48" rowspan="1"><i><small>row 8 to 11 hidden</small></i></th>
  
            </tr>
            <tr>
            <td colspan="1" rowspan="1">12</td>
            <th colspan="48" rowspan="1" class="bg-teal-400 text-black-50"><b><?= $form_values[11]['B']?></b></th>
  
            </tr>
            
        </thead>
        <tbody>
            
           
            
            
            <?php 
            
           $startRow = 13;

            foreach($form_values as $index => $row){
                if($index + 1 >= $startRow) { // Since $index starts from 0, we use $index + 1
                    
                      if (count(array_filter($row)) === 0) {
                            continue; // Skip this iteration if the row is empty
                        }
                        
                        if(is_numeric($row['AH'])){
                        $AH =  $row['AH'];
   
                            if($AH==0){
                            $AH_style ="bg-warning";
                            $AH_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AH = intval($row['R'])+intval($row['T'])+intval($row['V'])+intval($row['X'])+intval($row['Z'])+intval($row['AB'])+intval($row['AD'])+intval($row['AF']);
                            }
                            else{
                            $AH_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AH_style ="bg-danger"; 
                            }
                        
                        
                        }else{
                            $AH_style = "";
                            $AH = intval($row['R'])+intval($row['T'])+intval($row['V'])+intval($row['X'])+intval($row['Z'])+intval($row['AB'])+intval($row['AD'])+intval($row['AF']);
                        $AH_tooltip = "";
                            
                        }
                        if(is_numeric($row['AI'])){
                        $AI =  $row['AI'];
                            if($AI==0){
                            $AI_style ="bg-warning";
                            $AI_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AI =intval($row['S'])+intval($row['U'])+intval($row['W'])+intval($row['Y'])+intval($row['AA'])+intval($row['AC'])+intval($row['AE'])+intval($row['AG']);
                            }
                            else{
                            $AI_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AI_style ="bg-danger"; 
                            }
                        }else{
                            $AI_style = "";
                            $AI =intval($row['S'])+intval($row['U'])+intval($row['W'])+intval($row['Y'])+intval($row['AA'])+intval($row['AC'])+intval($row['AE'])+intval($row['AG']);
                        $AI_tooltip = "";
                            
                        }
                        if(is_numeric($row['AJ'])){
                        $AJ =  $row['AJ'];
                      
                            if($AJ==0){
                            $AJ_style ="bg-warning";
                            $AJ_tooltip = "data-popup='tooltip' title='The HEI Input is Zero(0), this is system auto calculation.'";
                            $AJ =intval($AI)+intval($AH);
                            }
                            else{
                            $AJ_tooltip = "data-popup='tooltip' title='Its not auto calculated from sheet.'";    
                            $AJ_style ="bg-danger"; 
                            }
                        
                        
                        
                        
                        }else{
                            $AJ_style = "";
                            $AJ =intval($AI)+intval($AH);
                            $AJ_tooltip = "";
                        }
                        
                        
            ?>     
            <tr>
                <td colspan="1" rowspan="1"><?= ($index+1)?></td>
            <td colspan="1" rowspan="1" ><?= $row['A']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['B']?$row['B']:"bg-danger" ?>"><?= $row['B']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['C']?$row['C']:"bg-danger" ?>"><?= $row['C']?></td>
            <td colspan="1" rowspan="1"><?= $row['D']?></td>
            <td colspan="1" rowspan="1" class="<?php echo  $row['D']?($row['E']?$row['E']:"bg-danger"):"" ?>"><?= $row['E']?></td>
           
            <td colspan="1" rowspan="1" class="<?= $row['F']?$row['F']:"bg-danger" ?>"><?= $row['F']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['G']?$row['G']:"bg-danger" ?>"><?= $row['G']?></td>
            <td colspan="1" rowspan="1" class="<?= $row['H']?$row['H']:"bg-danger" ?>"><?= $row['H']?></td>
            <td colspan="1" rowspan="1"><?= $row['I']?></td>
            <td colspan="1" rowspan="1"><?= $row['J']?></td>
            <td colspan="1" rowspan="1"><?= $row['K']?></td>
            <td colspan="1" rowspan="1"><?= $row['L']?></td>
            <td colspan="1" rowspan="1"><?= $row['M']?></td>
            <td colspan="1" rowspan="1"><?= $row['N']?></td>
            <td colspan="1" rowspan="1"><?= intval($row['M']) + intval($row['N']) ?></td>
            <td colspan="1" rowspan="1"><?= $row['P']?></td>
            <td colspan="1" rowspan="1"><?= $row['Q']?></td>
            <td colspan="1" rowspan="1"><?= $row['R']?></td>
            <td colspan="1" rowspan="1"><?= $row['S']?></td>
            <td colspan="1" rowspan="1"><?= $row['T']?></td>
            <td colspan="1" rowspan="1"><?= $row['U']?></td>
            <td colspan="1" rowspan="1"><?= $row['V']?></td>
            <td colspan="1" rowspan="1"><?= $row['W']?></td>
            <td colspan="1" rowspan="1"><?= $row['X']?></td>
            <td colspan="1" rowspan="1"><?= $row['Y']?></td>
            <td colspan="1" rowspan="1"><?= $row['Z']?></td>
            <td colspan="1" rowspan="1"><?= $row['AA']?></td>
            <td colspan="1" rowspan="1"><?= $row['AB']?></td>
            <td colspan="1" rowspan="1"><?= $row['AC']?></td>
            <td colspan="1" rowspan="1"><?= $row['AD']?></td>
            <td colspan="1" rowspan="1"><?= $row['AE']?></td>
            <td colspan="1" rowspan="1"><?= $row['AF']?></td>
            <td colspan="1" rowspan="1"><?= $row['AG']?></td>
            <td colspan="1" rowspan="1" <?= $AH_tooltip ?> class="<?= $AH_style ?>"><?= $AH ?></td>
            <td colspan="1" rowspan="1" <?= $AI_tooltip ?> class="<?= $AI_style ?>"><?= $AI ?></td>
            <td colspan="1" rowspan="1" <?= $AJ_tooltip ?> class="<?= $AJ_style ?>"><?= $AJ ?></td>
            <td colspan="1" rowspan="1"><?= $row['AK']?></td>
            <td colspan="1" rowspan="1"><?= $row['AL']?></td>
            <td colspan="1" rowspan="1"><?= intval($row['AK'])+intval($row['AL']) ?></td>
            <td colspan="1" rowspan="1"><?= $row['AN']?></td>
            <td colspan="1" rowspan="1"><?= $row['AO']?></td>
            <td colspan="1" rowspan="1"><?= intval($row['AN'])+intval($row['AO']) ?></td>
            <td colspan="1" rowspan="1"><?= $row['AQ'] ?></td>
            <td colspan="1" rowspan="1"><?= $row['AR'] ?></td>
            <td colspan="1" rowspan="1"><?= $row['AS'] ?></td>
            <td colspan="1" rowspan="1"><?= $row['AT'] ?></td>
            <td colspan="1" rowspan="1"><?= $row['AU'] ?></td>
            <td colspan="1" rowspan="1"><?= $row['AV'] ?></td>
            </tr>
            
             <?php   
            }
            }
            
            
            ?>
        </tbody>
        
        
        
        
    </table>
    



                                                            
                                                            
                                                        </div>
                                                 
                                                            
                                                     
                                                            
                                                            
                                                            
                                                       <br/>     
                                                            
                                         <ul class="nav nav-tabs nav-tabs-top border-bottom-0">
                                               <?php
                                         
                                               
                                                      foreach ($sheetnames as $sheetIndex => $sheetName) {
                                                                      
                                                     
                                                                        echo '<li class="nav-item"><a href="'.base_url().'Checks_Attachment/SUCNFFORMB/'.$checkid.'/'.$sheetIndex.'" class="nav-link '.($sheetName==$currentsheet?"active":"").'" >'.$sheetName.'</a></li>';
                                                          
                                                                        }
                                                      
                                                      ?>      
                                                           
                                             
                                             
									
									
								</ul>                   
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                       <b> REMARKS:</b>
                                                       <p>
                                                           <?= $check_dbrowdata->remarks?>
                                                       </p>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
							</div>
						</div>
					
					</div>
					<?php $this->load->view("page_comp/navigator"  ); ?>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

                        </div>
		
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

        
        <div id="modal_reject" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Remarks/Suggestions</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>checks/reject_check/<?= urlencode(base64_encode($checkid)) ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Remarks/Suggestions</label>
                                                                                                <textarea required style="height: 500px" 
                                                                                                          
                                                                                                          placeholder="Remarks/Suggestions" 
                                                                                                          name="remarks" class="form-control"><?= $check_dbrowdata->remarks?></textarea>
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn bg-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        
        
        
        
        
        
        <div id="modal_validateconsolidate" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Consolidating Please Wait...</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

                                                    <form action="<?= base_url()?>Checks_Attachment/SUCNFFORMB_consolidate/<?= $checkid ?>/<?php echo urlencode(base64_encode(base_url(uri_string()))) ?>"
                                                                                                          method="post" >
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>CHECK ID</label>
												<input type="text" name="checkid" readonly value="<?= $checkid?>" class="form-control">
											</div>
											<div class="col-sm-6">
												<label>INSTITUTION ID</label>
												<input type="text" name="checkid" readonly value="<?= $check_dbrowdata->instcode?>" class="form-control">
											</div>

											
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
											
                                                                                           This process will be consolidate all sheet of this form.
                                                                                           <br/>
                                                                                           Empty Program will not be imported.
                                                                                           
											</div>

											
										</div>
									</div>

									
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn bg-primary">Consolidate Form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        
        
       