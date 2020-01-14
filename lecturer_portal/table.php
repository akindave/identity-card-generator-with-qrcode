 <?php

                            if(isset($_SESSION['allist'])){
                            
                            
        
        //print_r("ss:".$value."<br/>");
                            }?>
                              <table class="table table-bordered">
                               <tr>
                                    <thead> 
                                        <th>S/N</th>
                                       <th>Matric No:</th> 
                                        
                                  
                                       <th>Name:</th> 
                                    </thead>
                                </tr>
                                
                            <?php 
                                  $a=1;
                            foreach($_SESSION['allist'] as $key=>$value){
                           // foreach($value as $keys=>$values){
                                
                                ?>
                                    <tbody>
                                        <tr>
                                            <td id="sn"><?php echo $a; ?></td>
                                            <td id="matric"><?php echo $value[0]; ?></td>
                                            <td id="names"><?php echo $value[1]; ?></td>
                                        </tr>
<!--
                                        <tr>
                                            <td>2</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>3</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>4</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
                                         <tr>
                                             <td>5</td>
                                            <td>160404019</td>
                                            <td>Akintan david luwagbounmi</td>
                                        </tr>
-->
                                    </tbody>
                                  <?php 
                                $a= $a+1;
                            }
                                  
                                  ?>
                             
                                
                                
                                </table>