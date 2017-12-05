<style type="text/css">
    h2.headng{
        margin-top: 0px;
        padding-top: 20px;
    }
    .pagination_sec{
        width: 100%;
        display: table;
        padding: 0px 15px;
        padding-bottom: 15px;
    }
    .pagination_sec .paging span{
        display: inline-block;
        padding: 7px 13px;
        border-radius: 4px;
        border: 1px solid #dd4b39;
        background-color: #dd4b39;
        color: #fff;
        text-transform: capitalize;
    }
    .pagination_sec .paging span a{
        color: #fff;
    }
    .spacer{
        display: block;
        margin-bottom: 15px;
    }
    .main-footer{
        margin:0px;
        width: 100%;
        display: table;
    }
</style>
<h2 class="headng">View Hotel</h2>
<div class="table-responsive">
    <div class="col-md-12">
    <div class="form_outer box">        
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <tbody>
                <tr>
                    <th>Id</th>
                    <td><?php echo $hotel[0]['Addhotel']['id']; ?></td>
                </tr>
                <tr>
                    <th>Hotel Name</th>
                    <td><?php echo $hotel[0]['Addhotel']['hotelname']; ?></td>
                </tr>
                <tr>
                    <th>Hotel Name(Greek)</th>
                    <td><?php echo $hotel[0]['Addhotel']['hotelname_greek']; ?></td>
                </tr>
                <tr>
                    <th>Code</th>
                    <td><?php echo $hotel[0]['Addhotel']['code']; ?></td>
                </tr>
                <tr>
                    <th>Group Name</th>
                    <td><?php echo $hotel[0]['Addhotel']['groupname']; ?></td>
                </tr>
                <tr>
                    <th>Group Name(Greek)</th>
                    <td><?php echo $hotel[0]['Addhotel']['groupname_greek']; ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo $hotel[0]['Addhotel']['description']; ?></td>
                </tr>
                <tr>
                    <th>Description(Greek)</th>
                    <td><?php echo $hotel[0]['Addhotel']['description_greek']; ?></td>
                </tr>
                    <?php 
                    $x = '1';
                    foreach ($about as $value) { ?>
                <tr>
                    <th>Images <?php echo $x; ?></th>
                    <td><div class="image_box"><img src="<?php echo $value['About']['image']; ?>" class="img-rounded" alt="Cinque Terre" width="256" height="200"></div></td>
                </tr>
                    <?php $x++; }
                    ?>
            </tbody>
    </table>
    </div>
    <div class="spacer"></div>
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="8">Services</th>
                </tr>
            </thead>
            <?php 
                $x = '1';
                foreach ($service as $value) { 
            ?>
            <tbody>                
                <tr>
                    <th>Title <?php echo $x; ?></th>
                    <td><?php echo $value['Service']['title']; ?></td>
                    <th>Title(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Service']['title_greek']; ?></td>
                    <th>Description <?php echo $x; ?></th>
                    <td><?php echo $value['Service']['description']; ?></td>
                    <th>Description(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Service']['description_greek']; ?></td>
                </tr>
            </tbody>
            <?php $x++; }
            ?>
        </table>
    </div>
    <div class="spacer"></div>
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="8">Facilities</th>
                </tr>
            </thead>
            <?php 
                $x = '1';
                foreach ($facilitie as $value) { 
            ?>
            <tbody>                
                <tr>
                    <th>Title <?php echo $x; ?></th>
                    <td><?php echo $value['Facilitie']['title']; ?></td>
                    <th>Title(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Facilitie']['title_greek']; ?></td>
                    <th>Description <?php echo $x; ?></th>
                    <td><?php echo $value['Facilitie']['description']; ?></td>
                    <th>Description(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Facilitie']['description_greek']; ?></td>
                </tr>
            </tbody>
            <?php $x++; }
            ?>
        </table>
    </div>
    <div class="spacer"></div>
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="10">Accommodation</th>
                </tr>
            </thead>
            <?php 
                $x = '1';
                foreach ($accommodation as $value) { 
            ?>
            <tbody>                
                <tr>
                    <th>Title <?php echo $x; ?></th>
                    <td><?php echo $value['Accommodation']['title']; ?></td>
                    <th>Title(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Accommodation']['title_greek']; ?></td>
                    <th>Description <?php echo $x; ?></th>
                    <td><?php echo $value['Accommodation']['description']; ?></td>
                    <th>Description(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Accommodation']['description_greek']; ?></td>
                    <th>Images <?php echo $x; ?></th>
                    <td><div class="image_box"><img src="<?php echo $value['Accommodation']['image']; ?>" class="img-rounded" alt="Cinque Terre" width="256" height="200"></div></td>
                </tr>
            </tbody>
            <?php $x++; }
            ?>
        </table>
    </div>
    <div class="spacer"></div>
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="6">Social Media</th>
                </tr>
            </thead>
            <?php 
                $x = '1';
                foreach ($social as $value) { 
            ?>
            <tbody>                
                <tr>
                    <th>Title <?php echo $x; ?></th>
                    <td><?php echo $value['Social']['title']; ?></td>
                    <th>Title(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Social']['title_greek']; ?></td>
                    <th>Link <?php echo $x; ?></th>
                    <td><?php echo $value['Social']['link']; ?></td>
                </tr>
            </tbody>
            <?php $x++; }
            ?>
        </table>
    </div>
    <div class="spacer"></div>
    <div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="8">Questionnaire</th>
                </tr>
            </thead>
            <?php 
                $x = '1';
                foreach ($questionnaire as $value) { 
            ?>
            <tbody>                
                <tr>
                    <th>Category <?php echo $x; ?></th>
                    <td><?php echo $value['Questionnaire']['category']; ?></td>
                    <th>Category(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Questionnaire']['category_greek']; ?></td>
                    <th>Title <?php echo $x; ?></th>
                    <td><?php echo $value['Questionnaire']['question']; ?></td>
                    <th>Title(Greek) <?php echo $x; ?></th>
                    <td><?php echo $value['Questionnaire']['question_greek']; ?></td>
                </tr>
            </tbody>
            <?php $x++; }
            ?>
        </table>
    </div>
    <div class="spacer"></div>
<div class="form_outer box">
        <table class="table table-striped table-bordered table-condensed table-hover table_cnts">
            <thead>                
                <tr>
                    <th colspan="4">Contact</th>
                </tr>
            </thead>
            <tbody>                
                <tr>
                    <th>Contact Us</th>
                    <td><?php echo $contact[0]['Contact']['info']; ?></td>
                    <th>Contact Us(Greek)</th>
                    <td><?php echo $contact[0]['Contact']['info_greek']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>




<div class="pagination_sec">    
    <?php if($loggeduserrole == "admin") { ?> 

<div class="row">
<div class="col-md-12">
 <div class="box">

    <h3 class="action">Actions</h3>
    <div class="btns"> 

    <?php echo $this->Form->postLink('Delete Hotel', array('action' => 'delete', $hotel[0]['Addhotel']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $hotel[0]['Addhotel']['id'])); ?>

    <?php } ?>
</div>

</div>
</div>
</div>