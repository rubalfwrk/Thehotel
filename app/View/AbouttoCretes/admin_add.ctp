<style>
	label{
		width:100%;
		float:left;
	}
	div.input{
		margin-bottom: 15px;
	}
	label{
		margin-bottom: 11px;
	}
	.btn.btn-primary{
		float: right;
		margin: 0px 11px 17px 3px;
	}
	.addbutton{
		float: right;
	}
	.tit-td{
		margin-bottom: 4px;
		}
		
</style>

<div class="page_heading">
	<h2 class="headng">Add About Crete</h2>
</div>

    <?php echo $this->Form->create('AbouttoCrete',array('enctype' => 'multipart/form-data'));?>
<div class="table-responsive">
	<div class="col-sm-9">
		<div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts" style="width:100%">
    
        <tr>
            <th class="tit-td"> Title </th> 
    		<td><input name="data[AboutCrete][title]" class="form-control tit-td" placeholder="Title" type="text" ></td>
		</tr>
        <tr>
            <th class="tit-td"> Title(Greek) </th> 
    		<td><input name="data[AboutCrete][title_greek]" class="form-control tit-td" placeholder="Title(Greek)" type="text" ></td>
		</tr>
		<tr>
    		<th class="tit-td"> Image </th> 
    		<td><input name="data[AboutCrete][image]" class="form-control tit-td" placeholder="Image" type="file" ></td>
		</tr>
        
		<tr>
            <th class="tit-td"> Description </th> 
    		<td><textarea name="data[AboutCrete][description]" class="form-control tit-td" placeholder="Description" ></textarea></td>
		</tr>
        <tr>
            <th class="tit-td"> Description(Greek) </th> 
    		<td><textarea name="data[AboutCrete][description_greek]" class="form-control tit-td textarea" placeholder="Description(Greek)"></textarea></td>
		</tr>

		<tr>
            <th class="tit-td"> Sub title  </th> 
            <td><input name="data[CreteDetail][title][]" class="form-control tit-td" placeholder="Title" type="text" >
        </td>
        </tr>
        <tr>
            <th class="tit-td"> Sub title(Greek)  </th> 
            <td><input name="data[CreteDetail][title_greek][]" class="form-control tit-td" placeholder="Title(Greek)" type="text" >
        </td>
        </tr>
        <tr>
            <th class="tit-td"> Sub Description  </th> 
            <td><textarea name="data[CreteDetail][description][]" class="form-control tit-td" placeholder="Descripiton" ></textarea></td>
        </tr>
        <tr>
            <th class="tit-td"> Sub Description(Greek)  </th> 
            <td><textarea name="data[CreteDetail][description_greek][]" class="form-control tit-td" placeholder="Descripiton(Greek)"></textarea></td>
        </tr>
        
        </table> <br><a href="" class="addbutton btn btn-success blue">Add More(+)</a>
        <?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary blue')); ?>
         <br>
        
        </div>
        </br>
        
	</div>
        
    </div>
</div>
    <?php echo $this->Form->end(); ?>
<script type="text/javascript">
        $(document).ready(function(){
            $(".addbutton").click(function(e){
                e.preventDefault();
                // console.log($(this).parent("div").find("table tr:last").length);

                $html = ' <tr><td><input name="data[CreteDetail][title][]" class="form-control" placeholder="Title" type="text" ></td><td><input name="data[CreteDetail][title_greek][]" class="form-control" placeholder="Title(Greek)" type="text" ></td><td><textarea name="data[CreteDetail][description][]" class="form-control" placeholder="Descripiton"></textarea></td><td><textarea name="data[CreteDetail][description_greek][]" class="form-control" placeholder="Descripiton(Greek)"></textarea></td></tr>';

                $(this).parent("div").find("table tr:last").after($html);
            })
        });

</script>

