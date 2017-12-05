<style>
	table{
		width:100%;
		margin:0px;
		font-size: 14px !important;
	}
	.form_outer{
		margin-bottom:20px;
	}
	.pagination_sec{
		padding: 0px 15px;
		padding-bottom: 15px;
	}
</style>
<div class="page_heading">
	<h2 class="headng">Questionnaire</h2>
</div>
<div class="table-responsive">
	<div class="col-sm-5">
		<div class="form_outer box">
			<table class="table table-striped table-bordered table-condensed table-hover table_cnts">
				<tbody>
					<tr>
						<th>Id</th>
						<td><?php echo h($Questionnaire['Questionnaire']['id']); ?></td>
					</tr>
	                
					<tr>
						<th>Category</th>
						<td><?php echo h($Questionnaire['Questionnaire']['category']); ?></td>
					</tr>
					<tr>
						<th>Category(Greek)</th>
						<td><?php echo h($Questionnaire['Questionnaire']['category_greek']); ?></td>
					</tr>
	                <tr>
						<th>Question</th>
						<td><?php echo h($Questionnaire['Questionnaire']['question']); ?></td>
					</tr>
					<tr>
						<th>Question(Greek)</th>
						<td><?php echo h($Questionnaire['Questionnaire']['question_greek']); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="pagination_sec">
	<?php echo $this->Html->link('Back', array('action' => 'index', $Questionnaire['Questionnaire']['hotelid']), array('class' => 'btn btn-default ')); ?>
</div>

