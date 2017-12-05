<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">

    <div class="box-header with-border">
		<h3 class="box-title">Edit Hotel</h3>
    </div>

<div class="row">
    <div class="col-md-12">
    <?php echo $this->Session->flash();?>
        <?php echo $this->Form->create('AddHotel',array('enctype' => 'multipart/form-data'));?>
         <?php echo $this->Form->input('id',array('value'=>$hotel[0]['Addhotel']['id'])); ?>
        <?php echo $this->Form->input('hotel name', array('class' => 'form-control','placeholder'=>'Hotel Name','required'=>'true','value'=>$hotel[0]['Addhotel']['hotelname'])); ?>
        <br />
        <div class="input text"><label for="AddHotelCode">Code</label><input required name="data[AddHotel][code]" class="form-control" placeholder="Hotel Code" type="number" id="AddHotelCode" value="<?= $hotel[0]['Addhotel']['code']; ?>"></div>
        <br />
        <?php echo $this->Form->input('group name', array('class' => 'form-control','placeholder'=>'Group Name','value'=>$hotel[0]['Addhotel']['groupname'] )); ?>
        <br />
        <div class="input text">
            <label for="AddHotelAbout">About Images</label>
            <input type="file"  required name="data[About][about][]" class="form-control" multiple="multiple" id="AddHotelAbout">

        </div>
            <table style="width:100%">
            	<?php 
				    $x = '1';
				    foreach ($about as $value) { ?>
					    <tr>
					        <td colspan="3">About Images <?php echo $x; ?></td>
					        <td colspan="3"><div  class="image_box"><img style="width:100px;height:100px;" src="<?php echo $value['About']['image']; ?>" class="img-rounded" alt="Cinque Terre" width="256" height="200"></div></td>
					        <td colspan="3"><div class="image_box"><a href="#" class="btn btn-success removebtn">Remove</a></div></td>
					    </tr>
				    <?php $x++; }
				    
				    ?>
            </table>
        <br />
        <?php echo $this->Form->input('description', array('class' => 'form-control','placeholder'=>'Descripiton','value'=>$hotel[0]['Addhotel']['description'])); ?>
        <br />   

        <div class="input text"><label for="AddHotelServices">Services</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Service][title][]" class="form-control" placeholder="Title" type="text" >
        </td>
        <td><input name="data[Service][description][]" class="form-control" placeholder="Descripiton" type="text" ></td>
        </tr>
        </table> <br><a href="" class="addbutton btn btn-success blue">Add More(+)</a> <br>
        </div>

        <table>
        <?php 
		    $x = '1';
		    foreach ($service as $value) { ?>

		    <tr>
		        <th>Title <?php echo $x; ?></th>
		        <td colspan="2"><?php echo $value['Service']['title']; ?></td>
		        <th>Description <?php echo $x; ?></th>
		        <td colspan="2"><?php echo $value['Service']['description']; ?></td>
		        <td colspan="2"><a href="" class="btn btn-success removebtn">Remove</a></td>
		    </tr>

		    <?php $x++; }
		    
		    ?>
		</table>
        </br>

        <div class="input text"><label for="AddHotelFacilities">Facilities</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Facilitie][category][]" class="form-control" placeholder="Category" type="text" ></td>
        <td><input name="data[Facilitie][title][]" class="form-control" placeholder="Title" type="text" ></td>
        <td><input name="data[Facilitie][description][]" class="form-control" placeholder="Descripiton" type="text" ></td>
        <td><input name="data[Facilitie][image][]" class="form-control" placeholder="Image" type="file" ></td>
        </tr>
        </table>
        </br><a href="" class="addsbutton btn btn-success blue">Add More(+)</a> <br></div>
  <table style="width:100%">
        	    <?php 
    $x = '1';
    foreach ($facilitie as $value) { ?>

    <tr>
        <th>Title <?php echo $x; ?></th>
        <td colspan="2"><?php echo $value['Facilitie']['title']; ?></td>
        <th>Description <?php echo $x; ?></th>
        <td colspan="2"><?php echo $value['Facilitie']['description']; ?></td>
        <th><a href="" class="btn btn-success removebtn">Remove</a></th>
    </tr>

    <?php $x++; }
    
    ?>
</table>

        <br />


        <div class="input text"><label for="AddHotelAccommodations">Accommodations</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Accommodation][title][]" class="form-control" placeholder="Title" type="text" ></td>
        <td><input name="data[Accommodation][description][]" class="form-control" placeholder="Descripiton" type="text" ></td>
        <td><input name="data[Accommodation][image][]" class="form-control" placeholder="Image" type="file" ></td>
        </tr>
        </table>
        </br><a href="" class="addssbutton btn btn-success blue">Add More(+)</a> <br></div>
        <table style="width: 100%">	
        	<?php 
    $x = '1';
    foreach ($accommodation as $value) { ?>

    <tr>
        <th>Title <?php echo $x; ?></th>
        <td><?php echo $value['Accommodation']['title']; ?></td>
        <th>Description <?php echo $x; ?></th>
        <td><?php echo $value['Accommodation']['description']; ?></td>
        <th>Images <?php echo $x; ?></th>
        <td><div class="image_box"><img src="<?php echo $value['Accommodation']['image']; ?>" class="img-rounded" alt="Cinque Terre" width="100" height="100"></div></td>
        <td><a href="" class="btn btn-success removebtn">Remove</a></td>
    </tr>

    <?php $x++; }
    
    ?>
</table>
        <br />

        <div class="input text"><label for="AddHotelSocials">Social Media</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Social][title][]" class="form-control" placeholder="Title" type="text" >
        </td>
        <td><input name="data[Social][link][]" class="form-control" placeholder="Link" type="text" ></td>
        </tr>
        </table> <br><a href="" class="addsobutton btn btn-success blue">Add More(+)</a> <br></div>
        <table style="width: 100%">
        <?php 
    $x = '1';
    foreach ($social as $value) { ?>

    <tr>
        <th>Title <?php echo $x; ?></th>
        <td colspan="2"><?php echo $value['Social']['title']; ?></td>
        <th>Link <?php echo $x; ?></th>
        <td colspan="2"><?php echo $value['Social']['link']; ?></td>
        <td colspan="2"><a href="" class="btn btn-success removebtn">Remove</a></td>
    </tr>

    <?php $x++; }
    
    ?>
    </table>
        </br>

        <div class="input text"><label for="AddHotelQuestionnaires">Questionnaires</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Questionnaire][category][]" class="form-control" placeholder="Category" type="text" ></td>
        <td><input name="data[Questionnaire][question][]" class="form-control" placeholder="Question" type="text" ></td>
        </tr>
        </table> 
        
        </br><a href="" class="addqubutton btn btn-success blue">Add More(+)</a> <br></div>
        
        <table style="width:100%">
        		<?php 
			    $x = '1';
			    foreach ($questionnaire as $value) { ?>

			    <tr>
			        <th>Category <?php echo $x; ?></th>
			        <td colspan="2"><?php echo $value['Questionnaire']['category']; ?></td>
			        <th>Title <?php echo $x; ?></th>
			        <td colspan="2"><input type="text" name="" value="<?php echo $value['Questionnaire']['question']; ?>"></td>
			        <th><a href="" class="btn btn-success removebtn">Remove</a></th>
			    </tr>

			    <?php $x++; }
			    
			    ?>
       	</table>
        <br />

        <?php echo $this->Form->input('contactus', array('class' => 'form-control','placeholder'=>'Contact Us', "value"=>$contact[0]['Contact']['info'])); ?>
        <br />      
    
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary blue')); ?>
        <?php echo $this->Form->end(); ?>
		<br />
    </div>
</div>

</div>
</div>
</div><!-- row -->
</section>

<style>
.select,.text,.email,.password,.checkbox {
    width: 100%;
    float: left;
	padding: 10px;
}

.select label,.text label,.email label,.password label {
    width: 100%;
    float: left;
}

.form-control {
    width: 98% !important;
    float: left;
    padding: 0px 15px;
}

#UserActive {
    margin: 4px 0 0 0px;
}

.btn.btn-primary{margin-left: 10px;}
.blue{
    background-color: #19577e;
    border-color: #19577e;
}
.blue:hover,.blue:active,.blue:focus{
    background-color: #19577e !important;
    border-color: #19577e !important;
}

</style>


<script type="text/javascript">
        $(document).ready(function(){
            $(".addbutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[Service][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[Service][description][]" class="form-control" placeholder="Descripiton" type="text" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addsbutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[Facilitie][category][]" class="form-control" placeholder="Category" type="text"></td><td><input name="data[Facilitie][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[Facilitie][description][]" class="form-control" placeholder="Descripiton" type="text" ></td><td><input name="data[Facilitie][image][]" class="form-control" placeholder="Image" type="file" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addssbutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[Accommodation][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[Accommodation][description][]" class="form-control" placeholder="Descripiton" type="text" ></td><td><input name="data[Accommodation][image][]" class="form-control" placeholder="Image" type="file" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>

<script type="text/javascript">
        $(document).ready(function(){
            $(".addsobutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[Service][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[Service][description][]" class="form-control" placeholder="Descripiton" type="text" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addqubutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[Questionnaire][category][]" class="form-control" placeholder="Category" type="text"></td><td><input name="data[Questionnaire][question][]" class="form-control" placeholder="Title" type="text" ></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })

			$('.removebtn').click(function(e){
				e.preventDefault();
				console.log('ok');
			});
        });


</script>

 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"
    });
    </script>