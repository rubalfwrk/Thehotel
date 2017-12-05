<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">

    <div class="box-header with-border">
		<h3 class="box-title">Add Hotel</h3>
    </div>

<div class="row">
    <div class="col-md-12">
    <?php echo $this->Session->flash();?>
        <?php echo $this->Form->create('AddHotel',array('type'=>'file','enctype'=>'multipart/form-data','accept-charset'=>"utf-8" ));?>
        
        <?php echo $this->Form->input('hotel name', array('class' => 'form-control','placeholder'=>'Hotel Name','required'=>'true')); ?>
        <br />
        <?php echo $this->Form->input('hotelname_greek', array('class' => 'form-control','placeholder'=>'Hotel Name(Greek)','required'=>'true')); ?>
        <br/>
        <div class="input text"><label for="AddHotelCode">Code</label><input required name="data[AddHotel][code]" class="form-control" placeholder="Hotel Code" type="number" id="AddHotelCode"></div>
        <br />
        <?php echo $this->Form->input('group name', array('class' => 'form-control','placeholder'=>'Group Name' )); ?>
        <br />
        <?php echo $this->Form->input('groupname_greek', array('class' => 'form-control','placeholder'=>'Group Name(greek)' )); ?>
        <br />
        <div class="input text">
            <label for="AddHotelAbout">About</label>
            <input type="file"  required name="data[About][about][]" class="form-control" multiple="multiple" id="AddHotelAbout">
        </div>
        <br />
        <?php echo $this->Form->input('description', array('type'=>'textarea','class' => 'form-control','placeholder'=>'Descripiton')); ?>
        <br />   
        <?php echo $this->Form->input('description_greek', array('class' => 'form-control','placeholder'=>'Descripiton(greek)')); ?>

        <br />
        <div class="input text"><label for="AddHotelServices">Services</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Service][title][]" class="form-control" placeholder="Title" type="text" >
        </td>
        <td><textarea name="data[Service][description][]" class="form-control" placeholder="Descripiton"></textarea></td>
        </tr>
        <tr>
        <td><input name="data[Service][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" >
        </td>
        <td><textarea name="data[Service][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td>
        </tr>
        </table> <br><a href="" class="addbutton btn btn-success blue">Add More(+)</a> <br></div>
        </br>

        <div class="input text"><label for="AddHotelFacilities">Facilities</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Facilitie][category][]" class="form-control" placeholder="Category" type="text" ></td>
        <td><input name="data[Facilitie][title][]" class="form-control" placeholder="Title" type="text" ></td>
        <td><textarea name="data[Facilitie][description][]" class="form-control" placeholder="Descripiton"></textarea></td>
        <td><input name="data[Facilitie][image][]" class="form-control" placeholder="Image" type="file" ></td>
        </tr>
        <tr>
        <td><input name="data[Facilitie][category_greek][]" class="form-control" placeholder="Category(greek)" type="text" ></td>
        <td><input name="data[Facilitie][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" ></td>
        <td><textarea name="data[Facilitie][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td>
        </tr>
        </table>
        </br><a href="" class="addsbutton btn btn-success blue">Add More(+)</a> <br></div>
        <br />

        <div class="input text"><label for="AddHotelAccommodations">Accommodations</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Accommodation][title][]" class="form-control" placeholder="Title" type="text" ></td>
        <td><textarea name="data[Accommodation][description][]" class="form-control" placeholder="Descripiton"></textarea></td>
        <td><input name="data[Accommodation][image][]" class="form-control" placeholder="Image" type="file" ></td>
        </tr>
        <tr>
        <td><input name="data[Accommodation][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" ></td>
        <td><textarea name="data[Accommodation][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td>
        </tr>
        </table>
        </br><a href="" class="addssbutton btn btn-success blue">Add More(+)</a> <br></div>
        <br />

        <div class="input text"><label for="AddHotelSocials">Social Media</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Social][title][]" class="form-control" placeholder="Title" type="text" >
        </td>
        <td><input name="data[Social][link][]" class="form-control" placeholder="Link" type="text" ></td>
        </tr>
        <tr>
        <td><input name="data[Social][title_greek][]" class="form-control" placeholder="Title(Greek)" type="text" >
        </td>
        </tr>
        </table> <br><a href="" class="addsobutton btn btn-success blue">Add More(+)</a> <br></div>
        </br>

        <div class="input text"><label for="AddHotelQuestionnaires">Questionnaires</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[Questionnaire][category][]" class="form-control" placeholder="Category" type="text" ></td>
        <td><input name="data[Questionnaire][question][]" class="form-control" placeholder="Question" type="text" ></td>
        </tr>
        <tr>
        <td><input name="data[Questionnaire][category_greek][]" class="form-control" placeholder="Category(Greek)" type="text" ></td>
        <td><input name="data[Questionnaire][question_greek][]" class="form-control" placeholder="Question(Greek)" type="text" ></td>
        </tr>
        </table> 

        </br><a href="" class="addqubutton btn btn-success blue">Add More(+)</a> <br></div>
        <br />
        <?php echo $this->Form->input('contactus', array('class' => 'form-control','placeholder'=>'Contact Us')); ?>
        <?php echo $this->Form->input('contactus_greek', array('class' => 'form-control','placeholder'=>'Contact Us(Greek)')); ?>
        <br />  

        <div class="input text"><label for="AddHotelUsefulNumber">UsefulNumbers</label>
        <table style="width:100%">
        <tr>
        <td><input name="data[UsefulNumber][title][]" class="form-control" placeholder="Title" type="text" ></td>
        <td><input name="data[UsefulNumber][number][]" class="form-control" placeholder="Number" type="text" ></td>
        </tr>
        <tr>
        <td><input name="data[UsefulNumber][title_greek][]" class="form-control" placeholder="Title(Greek)" type="text" ></td>
        </tr>
        </table>
        </br><a href="" class="conbutton btn btn-success blue">Add More(+)</a> <br></div>
        <br />    
    
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary blue')); ?>
        <?php echo $this->Form->end(); ?>
		<br />
    </div>
</div>

</div>
</div>
</div>
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

                $html = '<tr><td><input name="data[Service][title][]" class="form-control" placeholder="Title" type="text" ></td><td><textarea name="data[Service][description][]" class="form-control" placeholder="Descripiton"></textarea></td></tr><tr><td><input name="data[Service][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" ></td><td><textarea name="data[Service][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
                tinymce.init({
                         selector: "textarea",
                         plugins : "media"
                });
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addsbutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = '<tr><td><input name="data[Facilitie][category][]" class="form-control" placeholder="Category" type="text"></td><td><input name="data[Facilitie][title][]" class="form-control" placeholder="Title" type="text" ></td><td><textarea name="data[Facilitie][description][]" class="form-control" placeholder="Descripiton"></textarea></td><td><input name="data[Facilitie][image][]" class="form-control" placeholder="Image" type="file" ></td></tr><tr><td><input name="data[Facilitie][category_greek][]" class="form-control" placeholder="Category(greek)" type="text" ></td><td><input name="data[Facilitie][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" ></td><td><textarea name="data[Facilitie][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
                tinymce.init({
                         selector: "textarea",
                         plugins : "media"
                });
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addssbutton").click(function(e){
                e.preventDefault();
              

                $html = '<tr><td><input name="data[Accommodation][title][]" class="form-control" placeholder="Title" type="text" ></td><td><textarea name="data[Accommodation][description][]" class="form-control" placeholder="Descripiton"></textarea></td><td><input name="data[Accommodation][image][]" class="form-control" placeholder="Image" type="file" ></td></tr><tr><td><input name="data[Accommodation][title_greek][]" class="form-control" placeholder="Title(greek)" type="text" ></td><td><textarea name="data[Accommodation][description_greek][]" class="form-control" placeholder="Descripiton(greek)"></textarea></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
                 tinymce.init({
                         selector: "textarea",
                         plugins : "media"
                });
            })
        });

</script>

<script type="text/javascript">
        $(document).ready(function(){
            $(".addsobutton").click(function(e){
                e.preventDefault();

                $html = '<tr><td><input name="data[Social][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[Social][link][]" class="form-control" placeholder="Link" type="text" ></td></tr></tr><tr><td><input name="data[Social][title_greek][]" class="form-control" placeholder="Title(Greek)" type="text" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addqubutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = '<tr><td><input name="data[Questionnaire][category][]" class="form-control" placeholder="Category" type="text"></td><td><input name="data[Questionnaire][question][]" class="form-control" placeholder="Question" type="text" ></tr><tr><td><input name="data[Questionnaire][category_greek][]" class="form-control" placeholder="Category(Greek)" type="text" ></td><td><input name="data[Questionnaire][question_greek][]" class="form-control" placeholder="Question(Greek)" type="text" ></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>
<script type="text/javascript">
        $(document).ready(function(){
            $(".conbutton").click(function(e){
                e.preventDefault();

                $html = ' <tr><td><input name="data[UsefulNumber][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[UsefulNumber][number][]" class="form-control" placeholder="Number" type="text" ></td></tr><tr><td><input name="data[UsefulNumber][title_greek][]" class="form-control" placeholder="Title(Greek)" type="text"></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>

 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
             selector: "textarea",
             plugins : "media"
    });
    </script>