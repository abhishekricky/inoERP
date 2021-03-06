<div id ="form_header"><span class="heading">Receivable Transaction Header </span>
 <form action=""  method="post" id="ar_transaction_header"  name="ar_transaction_header">
  <div id="tabsHeader">
   <ul class="tabMain">
    <li><a href="#tabsHeader-1">Basic Info</a></li>
    <li><a href="#tabsHeader-2">Basic-2</a></li>
    <li><a href="#tabsHeader-3">Address</a></li>
    <li><a href="#tabsHeader-4">Finance</a></li>
    <li><a href="#tabsHeader-5">Summary</a></li>
    <li><a href="#tabsHeader-6">Receipts</a></li>
    <li><a href="#tabsHeader-7">Notes</a></li>
    <li><a href="#tabsHeader-8">Attachments</a></li>
    <li><a href="#tabsHeader-9">Actions</a></li>
   </ul>
   <div class="tabContainer">
    <div id="tabsHeader-1" class="tabContent">
     <div class="large_shadow_box"> 
      <ul class="column header_field">
       <li><label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="ar_transaction_header_id select_popup clickable">
         Transaction Id</label><?php $f->text_field_dsr('ar_transaction_header_id'); ?>
        <a name="show" href="form.php?class_name=ar_transaction_header&<?php echo "mode=$mode"; ?>" class="show document_id ar_transaction_header_id">
         <i class="fa fa-refresh"></i></a> 
       </li>
       <li><label>Transaction No</label><?php $f->text_field_d('transaction_number', 'primary_column2'); ?></li>
       <li><label>BU Name(1)</label><?php echo $f->select_field_from_object('bu_org_id', org::find_all_business(), 'org_id', 'org', $$class->bu_org_id, 'bu_org_id', '', 1, $readonly1); ?>             </li>
       <li><label>Transaction Type(2)</label><?php echo $f->select_field_from_object('transaction_type', ar_transaction_type::find_all(), 'ar_transaction_type_id', 'ar_transaction_type', $$class->transaction_type, 'transaction_type', '', 1, $readonly1); ?>             </li>
       <li><label>Ledger Name</label><?php echo form::select_field_from_object('ledger_id', gl_ledger::find_all(), 'gl_ledger_id', 'ledger', $$class->ledger_id, 'ledger_id', $readonly1, '', '', 1); ?>             </li>
       <li><label>Period Name</label><?php
        if (!empty($period_name_stmt)) {
         echo $period_name_stmt;
        } else {
         $f->text_field_d('period_id');
        }
        ?>
       </li>
       <li><label>Transaction Class</label><?php $f->text_field_dr('transaction_class'); ?></li>
       <li><label>Document Date</label>
        <?php echo $f->date_fieldFromToday_d('document_date', $$class->document_date, 1) ?></li>
       <li><label>Document Number</label><?php echo $f->text_field_d('document_number') ?></li>
       <li><label>Doc Status</label><?php echo $f->select_field_from_array('transaction_status', ar_transaction_header::$transaction_status_a, $$class->transaction_status); ?>         </li> 
      </ul>
     </div>
    </div>
    <div id="tabsHeader-2" class="tabContent">
     <div class="large_shadow_box"> 
      <ul class="column header_field">
       <li><?php echo $f->hidden_field_withId('ar_customer_id', $$class->ar_customer_id); ?>
        <label class="auto_complete"><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="ar_customer_id select_popup clickable">
         Customer Name</label><?php echo $f->text_field('customer_name', $$class->customer_name, '20', 'customer_name', 'select_customer_name', '', $readonly1); ?></li>
       <li><label class="auto_complete">Customer Number</label><?php $f->text_field_d('customer_number'); ?></li>
       <li><label>Customer Site</label><?php echo $f->select_field_from_object('ar_customer_site_id', $customer_site_obj, 'ar_customer_site_id', 'customer_site_name', $$class->ar_customer_site_id, 'ar_customer_site_id', 'ar_customer_site_id', '', $readonly1); ?> </li>
       <li><label>SO Number</label><?php $f->text_field_dr('sd_so_number'); ?></li>
       <li><label>Doc Owner</label><?php $f->text_field_d('document_owner'); ?></li> 
       <li><label>Approval Status</label><span class="button"><?php echo!empty($$class->approval_status) ? $$class->approval_status : ""; ?></span></li>
       <li><label>Description</label><?php $f->text_field_d('description'); ?></li> 
      </ul>					 
     </div>
    </div>
    <div id="tabsHeader-3" class="tabContent">
     <div class="left_half shipto address_details">
      <ul class="column header_field">
       <li><label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="address_id select_popup clickable">
         Ship To Site Id : </label>
        <?php $f->text_field_d('ship_to_id', 'address_id site_address_id'); ?>
       </li>
       <li><label>Address Name : </label><?php $f->text_field_dr('ship_to_address_name', 'address_name'); ?></li>
       <li><label>Address :</label> <?php $f->text_field_dr('ship_to_address', 'address'); ?></li>
       <li><label>Country  : </label> <?php $f->text_field_dr('ship_to_country', 'country'); ?></li>
       <li><label>Postal Code  : </label><?php echo $f->text_field_dr('ship_to_postal_code', 'postal_code'); ?></li>
      </ul>
     </div> 
     <div class="right_half billto address_details">
      <ul class="column header_field">
       <li><label><img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="address_id select_popup clickable">
         Bill To Site Id :</label>
        <?php $f->text_field_d('bill_to_id', 'address_id site_address_id'); ?>
       </li>
       <li><label>Address Name :</label><?php $f->text_field_dr('bill_to_address_name', 'address_name'); ?> </li>
       <li><label>Address :</label> <?php $f->text_field_dr('bill_to_address', 'address'); ?></li>
       <li><label>Country  : </label> <?php $f->text_field_dr('bill_to_country', 'country'); ?></li>
       <li><label>Postal Code  : </label><?php echo $f->text_field_dr('bill_to_postal_code', 'postal_code'); ?></li>
      </ul>
     </div> 

    </div>

    <div id="tabsHeader-4" class="tabContent">
     <div> 
      <ul class="column header_field">
       <li><label>Currency</label><?php echo form::select_field_from_object('currency', option_header::currencies(), 'option_line_code', 'option_line_value', $$class->currency, 'currency', $readonly1, '', '', 1); ?>             </li>
       <li><label>Doc Currency</label>
        <?php echo form::select_field_from_object('doc_currency', option_header::currencies(), 'option_line_code', 'option_line_value', $$class->doc_currency, 'doc_currency', $readonly1, '', '', 1); ?>
       </li>
       <li><label>Payment Term</label><?php echo $f->select_field_from_object('payment_term_id', payment_term::find_all(), 'payment_term_id', 'payment_term', $$class->payment_term_id, 'payment_term_id', '', 1, $readonly1); ?>             </li>
       <li><label>Payment Term Date</label><?php echo $f->date_fieldFromToday_d('payment_term_date', $$class->payment_term_date) ?>             </li>
       <li><label>Sales Person</label><?php $f->text_field_d('sales_person') ?></li>
       <li><label>Exchange Rate Type</label><?php echo $f->select_field_from_object('exchange_rate_type', gl_currency_conversion::currency_conversion_type(), 'option_line_code', 'option_line_code', $$class->exchange_rate_type, 'exchange_rate_type', '', 1, $readonly); ?></li>
       <li><label>Exchange Rate</label><?php $f->text_field_d('exchange_rate'); ?>              </li>
       <li><label>Header Amount</label><?php form::number_field_d('header_amount'); ?></li>
       <li><label>Tax Amount</label><?php form::number_field_d('tax_amount'); ?></li>
       <li><label>Journal Header Id</label><?php $f->text_field_dr('gl_journal_header_id'); ?></li>
       <li><label>Receivable Ac</label><?php $f->ac_field_dm('receivable_ac_id'); ?></li>
      </ul>
     </div>
    </div>
    <div id="tabsHeader-5" class="tabContent">
     <div> 
      <ul class="column five_column">
       <li><label>Receipt Status : </label>                      
        <?php echo $f->text_field_dr('receipt_status'); ?>
       </li>
       <li><label>Receipt Amount : </label>
        <?php form::number_field_dr('receipt_amount'); ?>
       </li>
      </ul>
     </div>
    </div>
    <div id="tabsHeader-6" class="tabContent">
     <div> 

     </div>
    </div>
    <div id="tabsHeader-7" class="tabContent">
     <div id="comments">
      <div id="comment_list">
       <?php echo!(empty($comments)) ? $comments : ""; ?>
      </div>
      <div id ="display_comment_form">
       <?php
       $reference_table = 'ar_transaction_header';
       $reference_id = $$class->ar_transaction_header_id;
       ?>
      </div>
      <div id="new_comment">
      </div>
     </div>
    </div>

    <div id="tabsHeader-8" class="tabContent">
     <div> <?php echo ino_attachement($file) ?> </div>
    </div>

    <div id="tabsHeader-9" class="tabContent">
     <div> 
      <ul class="column five_column">
       <li><label>Action</label>
        <?php echo $f->select_field_from_array('transaction_action', $$class->action_a, '', 'transaction_action', '', '', $readonly); ?>
       </li>
       <li id="document_print"><label>Document Print : </label>
        <a class="button" target="_blank"
           href="modules/ar/transaction/transaction_print.php?ar_transaction_header_id=<?php echo!(empty($$class->ar_transaction_header_id)) ? $$class->ar_transaction_header_id : ""; ?>" >Transaction</a>
       </li>
       <li id="document_status"><label>Change Status : </label>
        <?php echo form::select_field_from_object('approval_status', ar_transaction_header::ar_approval_status(), 'option_line_code', 'option_line_value', $ar_transaction_header->approval_status, 'set_approval_status', $readonly, '', ''); ?>
       </li>
       <li id="copy_header"><label>Copy Document : </label>
        <input type="button" class="button" id="copy_docHeader" value="Header">
       </li>
       <li id="copy_line"><label></label>
        <input type="button" class="button" id="copy_docLine" value="Lines">
       </li>
      </ul>

      <div id="comment" class="show_comments">
      </div>
     </div>
    </div>

   </div>

  </div>
 </form>
</div>

<div id="form_line" class="form_line"><span class="heading">Transaction Lines & Details </span>
 <form action=""  method="post" id="ar_transaction_line"  name="ar_transaction_line">
  <div id="tabsLine">
   <ul class="tabMain">
    <li><a href="#tabsLine-1">Basic</a></li>
    <li><a href="#tabsLine-2">Finance</a></li>
    <li><a href="#tabsLine-3">References</a></li>
    <li><a href="#tabsLine-4">Notes</a></li>
   </ul>
   <div class="tabContainer">
    <div id="tabsLine-1" class="tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th>Action</th>
        <th>Seq#</th>
        <th>Line Id</th>
        <th>Line#</th>
        <th>Type</th>
        <th>Item Number</th>
        <th>Item Description</th>
        <th>UOM</th>
        <th>Quantity</th>
        <th>Trnx Details</th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($ar_transaction_line_object as $ar_transaction_line) {
//							$f->readonly2 = !empty($ar_transaction_line->ar_transaction_line_id) ? true : false;
        ?>         
        <tr class="ar_transaction_line<?php echo $count ?>">
         <td>
          <?php
          echo ino_inline_action($$class_second->ar_transaction_line_id, array('ar_transaction_header_id' => $$class->ar_transaction_header_id,
           'transaction_type' => $$class->transaction_type));
          ?>
         </td>
         <td><?php $f->seq_field_d($count) ?></td>
         <td><?php form::text_field_wid2sr('ar_transaction_line_id'); ?></td>
         <td><?php echo form::text_field('line_number', $$class_second->line_number, '8', '20', 1, 'Auto no', '', $readonly, 'lines_number'); ?></td>
         <td><?php echo $f->select_field_from_object('line_type', ar_transaction_line::ar_transaction_line_types(), 'option_line_code', 'option_line_value', $$class_second->line_type, '', 'line_type', '', $readonly1); ?></td>
         <td><?php
          echo $f->hidden_field('item_id_m', $$class_second->item_id_m);
          $f->text_field_wid2('item_number', 'select_item_number');
          ?>
          <img src="<?php echo HOME_URL; ?>themes/images/serach.png" class="select_item_number select_popup"></td>
         <td><?php $f->text_field_wid2m('item_description'); ?></td>
         <td><?php echo $f->select_field_from_object('uom_id', uom::find_all(), 'uom_id', 'uom_name', $ar_transaction_line->uom_id); ?></td>
         <td><?php form::number_field_wid2sm('inv_line_quantity'); ?></td>
         <td class="add_detail_values"><i class="fa fa-arrow-circle-down add_detail_values_img"></i>
          <!--</td></tr>-->	
          <?php
          $ar_transaction_line_id = $ar_transaction_line->ar_transaction_line_id;
          if (!empty($ar_transaction_line_id)) {
           $ar_transaction_detail_object = ar_transaction_detail::find_by_ar_transaction_lineId($ar_transaction_line_id);
          } else {
           $ar_transaction_detail_object = array();
          }
          if (count($ar_transaction_detail_object) == 0) {
           $ar_transaction_detail = new ar_transaction_detail();
           $ar_transaction_detail_object = array();
           array_push($ar_transaction_detail_object, $ar_transaction_detail);
          }
          ?>
                                         <!--						 <tr><td>-->
          <div class="class_detail_form">
           <fieldset class="form_detail_data_fs"><legend>Detail Data</legend>
            <div class="tabsDetail">
             <ul class="tabMain">
              <li class="tabLink"><a href="#tabsDetail-1-<?php echo $count ?>">Basic</a></li>
              <li class="tabLink"><a href="#tabsDetail-2-<?php echo $count ?>">References</a></li>
             </ul>
             <div class="tabContainer">
              <div id="tabsDetail-1-<?php echo $count ?>" class="tabContent">
               <table class="form form_detail_data_table detail">
                <thead>
                 <tr>
                  <th>Action</th>
                  <th>Seq#</th>
                  <th>Detail Id</th>
                  <th>Detail# </th>
                  <th>Type</th>
                  <th>Account</th>
                  <th>Amount</th>
                  <th>GL-Amount</th>
                  <th>Description</th>
                 </tr>
                </thead>
                <tbody class="form_data_detail_tbody">
                 <?php
                 $detailCount = 0;
                 foreach ($ar_transaction_detail_object as $ar_transaction_detail) {
                  $class_third = 'ar_transaction_detail';
                  $$class_third = &$ar_transaction_detail;
//												pa($ar_transaction_detail);
                  ?>
                  <tr class="ar_transaction_detail<?php echo $count . '-' . $detailCount; ?>">
                   <td>
                    <?php
                    echo ino_inline_action($$class_third->ar_transaction_detail_id, array('ar_transaction_header_id' => $$class->ar_transaction_header_id,
                     'ar_transaction_line_id' => $$class_second->ar_transaction_line_id), 'add_row_detail_img', 'detail_id_cb');
                    ?>
                   </td>
                   <td><?php $f->seq_field_detail_d($detailCount) ?></td>
                   <td><?php $f->text_field_wid3sr('ar_transaction_detail_id'); ?></td>
                   <td><?php $f->text_field_wid3s('detail_number'); ?></td>
                   <td><?php echo $f->select_field_from_object('account_type', gl_journal_line::gl_journal_line_types(), 'option_line_code', 'option_line_value', $$class_third->account_type, '', 'account_type'); ?></td>
                   <td><?php $f->ac_field_d3('detail_ac_id'); ?></td>
                   <td><?php $f->text_field_wid3s('amount'); ?></td>
                   <td><?php $f->text_field_wid3s('gl_amount'); ?></td>
                   <td><?php $f->text_field_wid3('description'); ?></td>

                  </tr>
                  <?php
                  $detailCount++;
                 }
                 ?>
                </tbody>
               </table>
              </div>
              <div id="tabsDetail-2-<?php echo $count ?>" class="tabContent">
               <table class="form form_detail_data_table detail">
                <thead>
                 <tr>
                  <th>Seq#</th>
                  <th>Period</th>
                  <th>Ref Key Name</th>
                  <th>Ref Key Value</th>
                  <th>View Ref Doc</th>
                  <th>Status</th>
                  <th>Journal_Created?</th>
                 </tr>
                </thead>
                <tbody class="form_data_detail_tbody">
                 <?php
                 $detailCount = 0;
                 foreach ($ar_transaction_detail_object as $ar_transaction_detail) {
                  $class_third = 'ar_transaction_detail';
                  $$class_third = &$ar_transaction_detail;
                  ?>
                  <tr class="ar_transaction_detail<?php echo $count . '-' . $detailCount; ?> ">
                   <td><?php $f->seq_field_detail_d($detailCount) ?></td>
                   <td><?php $f->text_field_wid3s('period_id') ?></td>
                   <td><?php $f->text_field_d3('reference_key_name'); ?></td>
                   <td><?php $f->text_field_d3('reference_key_value'); ?></td>
                   <td><?php echo!empty($ref_doc_stmt) ? $ref_doc_stmt : '' ?></td>
                   <td><?php $f->text_field_wid3sr('status'); ?></td>
                   <td><?php echo $f->checkBox_field('journal_created_cb', $$class_third->journal_created_cb, '', '', 1); ?></td>
                  </tr>
                  <?php
                  $detailCount++;
                 }
                 ?>
                </tbody>
               </table>
              </div>
             </div>
            </div>


           </fieldset>

          </div>

         </td></tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
     </table>
    </div>
    <div id="tabsLine-2" class="scrollElement tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th>Seq#</th>
        <th>Unit Price</th>
        <th>Line Price</th>
        <th>Tax Code</th>
        <th>Tax Amount</th>
        <th>GL Line Price</th>
        <th>GL Tax Amount</th>
        <th>Line Description</th>
        <th>Status</th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($ar_transaction_line_object as $ar_transaction_line) {
        ?>         
        <tr class="ar_transaction_line<?php echo $count ?>">
         <td><?php $f->seq_field_d($count) ?></td>
         <td><?php form::number_field_wid2m('inv_unit_price'); ?></td>
         <td><?php form::text_field_wid2m('inv_line_price'); ?></td>
         <td><?php echo $f->select_field_from_object('tax_code_id', mdm_tax_code::find_all_outTax_by_bu_org_id($$class->bu_org_id), 'mdm_tax_code_id', 'tax_code', $$class_second->tax_code_id, '', 'output_tax medium', '', $readonly1, '', '', '', 'percentage') ?></td>
         <td><?php form::number_field_wid2('tax_amount'); ?></td>
         <td><?php form::number_field_wid2('gl_inv_line_price'); ?></td>
         <td><?php form::number_field_wid2('gl_tax_amount'); ?></td>
         <td><?php $f->text_field_wid2('line_description'); ?></td>
         <td><?php $f->text_field_wid2sr('status'); ?></td>
        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
      <!--                  Showing a blank form for new entry-->
     </table>
    </div>
    <div id="tabsLine-3" class="scrollElement tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th>Seq#</th>
        <th>SO Header Id</th>
        <th>SO Line Id</th>
        <th>Is Asset</th>
        <th>Asset Category</th>
        <th>Project Header Id</th>
        <th>Project Line Id</th>
        <th>Ref Key Name</th>
        <th>Ref Key Value</th>
        <th>View Ref Doc</th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($ar_transaction_line_object as $ar_transaction_line) {
        ?>         
        <tr class="ar_transaction_line<?php echo $count ?>">
         <td><?php $f->seq_field_d($count) ?></td>
         <td><?php $f->text_field_wid2sr('sd_so_header_id'); ?></td>
         <td><?php $f->text_field_wid2sr('sd_so_line_id'); ?></td>
         <td><?php form::checkBox_field('asset_cb', $$class_second->asset_cb); ?></td>
         <td><?php $f->text_field_wid2sr('fa_asset_category_id'); ?></td>
         <td><?php $f->text_field_wid2sr('prj_project_header_id'); ?></td>
         <td><?php $f->text_field_wid2sr('prj_project_line_id'); ?></td>
         <td><?php $f->text_field_d2('reference_key_name'); ?></td>
         <td><?php $f->text_field_d2('reference_key_value'); ?></td>
         <td><?php echo!empty($ref_doc_stmt) ? $ref_doc_stmt : '' ?></td>

        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
      <!--                  Showing a blank form for new entry-->
     </table>
    </div>
    <div id="tabsLine-4" class="tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th>Comments</th>

       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($ar_transaction_line_object as $ar_transaction_line) {
        ?>         
        <tr class="ar_transaction_line<?php echo $count ?>">
         <td></td>
        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
      <!--                  Showing a blank form for new entry-->

     </table>
    </div>
   </div>
  </div>
 </form>

</div>

<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="ar_transaction_header" ></li>
  <li class="lineClassName" data-lineClassName="ar_transaction_line" ></li>
  <li class="detailClassName" data-detailClassName="ar_transaction_detail" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="false" ></li>
  <li class="primary_column_id" data-primary_column_id="ar_transaction_header_id" ></li>
  <li class="form_header_id" data-form_header_id="ar_transaction_header" ></li>
  <li class="line_key_field" data-line_key_field="item_description" ></li>
  <li class="single_line" data-single_line="false" ></li>
  <li class="form_line_id" data-form_line_id="ar_transaction_line" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="ar_transaction_header_id" ></li>
  <li class="docLineId" data-docLineId="ar_transaction_line_id" ></li>
  <li class="docDetailId" data-docDetailId="ar_transaction_detail_id" ></li>
  <li class="btn1DivId" data-btn1DivId="ar_transaction_header" ></li>
  <li class="btn2DivId" data-btn2DivId="form_line" ></li>
  <li class="trClass" data-docHedaderId="ar_transaction_line" ></li>
  <li class="tbodyClass" data-tbodyClass="form_data_line_tbody" ></li>
  <li class="noOfTabbs" data-noOfTabbs="4" ></li>
 </ul>
</div>