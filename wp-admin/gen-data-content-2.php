<?php
   $ds_trang_tin_b1 = $_POST['ds_trang_tin_b1'];
   if (!$ds_trang_tin_b1) {
     $ds_trang_tin_b1 = 1;
   }
   
   $ds_trang_tin_b2 = $_POST['ds_trang_tin_b2'];
   if (!$ds_trang_tin_b2) {
     $ds_trang_tin_b2 = 1;
   }
   
   $ds_trang_tin_b3 = $_POST['ds_trang_tin_b3'];
   if (!$ds_trang_tin_b3) {
     $ds_trang_tin_b3 = 1;
   }
   
   $ds_trang_tin_b4 = $_POST['ds_trang_tin_b4'];
   if (!$ds_trang_tin_b4) {
     $ds_trang_tin_b4 = 1;
   }
   
   $ds_trang_tin_b5 = $_POST['ds_trang_tin_b5'];
   if (!$ds_trang_tin_b5) {
     $ds_trang_tin_b5 = 1;
   }


   ?>
<script>
   window.onload = function moveElement() {
   document.getElementById('wpbody-content').appendChild(  document.getElementById('big-div') )
   }
   
   function form_validation() {
   
   }
   function updateData1(num, size, form, suffix) {
     for (let i = 1;i <= parseInt(size);i++) {
       let order = 'ds_trang_tin_b'+num+'_'+suffix+i;
       let element = document.getElementById(order);
       if (element) {
         str = element.value;
         str = str.replace(/\\'/g, "'");
         str = str.replace(/\\"/g, "\"");
         str = str.replace(/(?:\r\n|\r|\n)/g, '<br/>');
         //str = str.replace(/\\\"/g, '"');
         str = str.replace(/'/g, '"');
         element.value = str;
       }
     }
   }
   function updateData_1(num, size, form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 1);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 0);
   }
   function updateData_2(num, size, form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 1);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 0);
   }
   function updateData_3(num, size, form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 1);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 0);
   }
   function updateData_4(num, size, form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 1);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 0);
   }
   function updateData_5(num, size, form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 1);
   }
   function updateData(num, size, form, delta) {
      updateData1(num, size, form, '');
      updateData1(num, size, form, 'note_');
      updateData1(num, size, form, 'tieude_');
      updateData1(num, size, form, 'ngaydang_');
      updateData1(num, size, form, 'mota_');
      updateData1(num, size, form, 'goc_');
      let element = document.getElementById('ds_trang_tin_b'+num);
      if (element) {
       element.value=parseInt(element.value)+delta;
      }
      form.action='';
   }
   function submitAll(form) {
      updateAll(form);
      form.action='gen-data.php';
   }
   function updateAll(form) {
      let sizeElement = document.getElementById('ds_trang_tin_b1');
      updateData(1, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b2');
      updateData(2, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b3');
      updateData(3, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b4');
      updateData(4, parseInt(sizeElement.value), form, 0);
      sizeElement = document.getElementById('ds_trang_tin_b5');
      updateData(5, parseInt(sizeElement.value), form, 0);
   }


   function deleteData1(num, size, form, id) {
      for (let i = id;i < size;i++) {
        let sizeElement1 = document.getElementById('ds_trang_tin_b'+num+'_'+i);
        let sizeElement2 = document.getElementById('ds_trang_tin_b'+num+'_'+(i+1));
        sizeElement1.value=sizeElement2.value;
      }
      let sizeElement = document.getElementById('ds_trang_tin_b'+num);
      if (sizeElement) {
       sizeElement.value=parseInt(sizeElement.value)-1;
      }
      form.action='';
      updateAll(form);
   }
   function deleteData2(num, size, form, id) {
      for (let i = id;i < size;i++) {
        let sizeElement1 = document.getElementById('ds_trang_tin_b'+num+'_'+i);
        let sizeElement2 = document.getElementById('ds_trang_tin_b'+num+'_'+(i+1));
        sizeElement1.value=sizeElement2.value;
        let sizeElement3 = document.getElementById('ds_trang_tin_b'+num+'_note_'+i);
        let sizeElement4 = document.getElementById('ds_trang_tin_b'+num+'_note_'+(i+1));
        sizeElement3.value=sizeElement4.value;
      }
      let sizeElement = document.getElementById('ds_trang_tin_b'+num);
      if (sizeElement) {
       sizeElement.value=parseInt(sizeElement.value)-1;
      }
      form.action='';
      updateAll(form);
   }
   function deleteData3(num, size, form, id) {
      for (let i = id;i < size;i++) {
        let sizeElement3 = document.getElementById('ds_trang_tin_b'+num+'_tieude_'+i);
        let sizeElement4 = document.getElementById('ds_trang_tin_b'+num+'_tieude_'+(i+1));
        sizeElement3.value=sizeElement4.value;
        let sizeElement5 = document.getElementById('ds_trang_tin_b'+num+'_ngaydang_'+i);
        let sizeElement6 = document.getElementById('ds_trang_tin_b'+num+'_ngaydang_'+(i+1));
        sizeElement5.value=sizeElement6.value;
        let sizeElement7 = document.getElementById('ds_trang_tin_b'+num+'_mota_'+i);
        let sizeElement8 = document.getElementById('ds_trang_tin_b'+num+'_mota_'+(i+1));
        sizeElement7.value=sizeElement8.value;
        let sizeElement9 = document.getElementById('ds_trang_tin_b'+num+'_goc_'+i);
        let sizeElement10 = document.getElementById('ds_trang_tin_b'+num+'_goc_'+(i+1));
        sizeElement9.value=sizeElement10.value;
      }
      let sizeElement = document.getElementById('ds_trang_tin_b'+num);
      if (sizeElement) {
       sizeElement.value=parseInt(sizeElement.value)-1;
      }
      form.action='';
      updateAll(form);
   }
</script>
<div lang=EN-GB link="#0563C1" vlink="#954F72">
<div id='big-div' class=WordSection1>
   <?php
      if ($_POST['dateRange'] == 'day') {
        $day = 'selected';
      }
      if ($_POST['dateRange'] == 'week') {
        $week = 'selected';
      }
      if ($_POST['dateRange'] == 'month') {
        $month = 'selected';
      }
      if ($submitable) {
        echo '<form onsubmit="return form_validation()" method="POST" name="customer_details">';
         echo '<input type="submit" value="Xuất báo cáo" onclick="javascript: submitAll(form);">';
         echo '
                    <select id="dateRange" name="dateRange">
                    <option value="day" '.$day.'>Today</option>
                    <option value="week" '.$week.'>Week</option>
                    <option value="month" '.$month.'>Month</option>
                    </select>
          ';
          echo '<input type="submit" value="Reload" onclick="form.action='.'">';
      }
      ?>
   <p class=MsoNormal align=center style='text-align:center'><b><span
      style='font-size:14.0pt;line-height:130%'><img width=962 height=174
      id="Picture 2" src="Tin%20tuc%20ATTT%20ngay%20(1)_files/image001.png"></span></b></p>
   <h1 class=MsoNormal align=center style='text-align:center'><span lang=VI
      style='font-size:30.0pt;line-height:130%'>B&#7842;N TIN AN TOÀN THÔNG TIN</span></h1>
   <div style='border:solid windowtext 1.0pt;padding:1.0pt 4.0pt 1.0pt 4.0pt'>
      <p class=MsoNormal style='border:none;padding:0cm'><b><span lang=VI>TH&#7900;I
         GIAN</span></b><span lang=VI> (d/m/Y): <?php echo date("d/m/Y"); ?> </span>
      </p>
      <p class=MsoNormal style='border:none;padding:0cm'><b><span lang=VI>NG&#431;&#7900;I
         &#272;&#258;NG:</span><span
            lang=VI> <?php echo $_POST['customer_name']; ?>
         <?php if ($submitable) {
            echo '<input hidden id="customer_name" name="customer_name" value="'.$_POST['customer_name'].'" type="text" />';
            }
            ?>
         </span>
      </p>
      <p class=MsoNormal><b><span lang=VI>LO&#7840;I TIN</span></b><span lang=VI>:
         <?php echo $_POST['loai_tin']; ?>
         <?php if ($submitable) {
            echo '<input id="loai_tin" name="loai_tin" value="'.$_POST['loai_tin'].'" type="text" />';
            }
            ?></span>
      </p>
   </div>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>I. DANH SÁCH CÁC
      WEBSITE B&#7882; HACK (*.vn; *.gov.vn)</span></b>
   </p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>1. Danh sách
      trang tin</span></b>
   </p>
   <!-- BANG 1 -->
   <!-- BANG 1 -->
   <!-- BANG 1 -->
   <!-- BANG 1 -->
   <!-- BANG 1 -->
   <!-- BANG 1 -->
   <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>STT</span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>&#272;&#7883;a
               ch&#7881; URL</span></b>
            </p>
         </td>

         <?php
            if ($submitable) {
                echo '
                 <td width=564 valign=top style="width:10pt;border:solid windowtext 1.0pt;
                    border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt">
                    <p class=MsoNormal align=center style="text-align:center"><b><span lang=VI>X</span></b>
                    </p>
                 </td>
                ';
            }
         ?>

      </tr>
      <?php
         // gen bang 1
         
                       for ($i = 1;$i <= $ds_trang_tin_b1;$i++) {
         
                       ?>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI><?php echo $i ?></span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b1_'.$i.'" name="ds_trang_tin_b1_'.$i.'" type="text" >'.$_POST['ds_trang_tin_b1_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b1_'.$i]; }?>
         </td>

         <?php
            if ($submitable) {
                echo '
                 <td width=59 valign=top style="width:10pt;border:solid windowtext 1.0pt;
                    border-top:none;padding:0cm 5.4pt 0cm 5.4pt">
                    <p class=MsoNormal align=center style="text-align:center"><b><span lang=VI>
                      <input type="submit" value="x" onclick="javascript: deleteData1(1, '.$ds_trang_tin_b1.', form, '.$i.');">
                    </span></b>
                 </td>
                ';
            }
         ?>
      </tr>
      <?php
         }
         
         ?>
   </table>
   <?php
      if ($submitable) {
          echo '<input type="submit" value="Them hang" onclick="javascript: updateData_1(1, '.$ds_trang_tin_b1.', form);">';
          echo '<input hidden id="ds_trang_tin_b1" name="ds_trang_tin_b1" type="text" value="'.$ds_trang_tin_b1.'" />';
      }
      ?>
   <!-- BANG 2 -->
   <!-- BANG 2 -->
   <!-- BANG 2 -->
   <!-- BANG 2 -->
   <!-- BANG 2 -->
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>2. &#272;i&#7875;m
      tin</span></b>
   </p>
   <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=56 valign=top style='width:42.3pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>STT</span></b></p>
         </td>
         <td width=346 valign=top style='width:269.35pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>&#272;&#7883;a
               ch&#7881; URL</span></b>
            </p>
         </td>
         <td width=202 valign=top style='width:155.85pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Ghi
               chú/tình tr&#7841;ng</span></b>
            </p>
         </td>
         <?php
            if ($submitable) {
                echo '
                 <td width=564 valign=top style="width:10pt;border:solid windowtext 1.0pt;
                    border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt">
                    <p class=MsoNormal align=center style="text-align:center"><b><span lang=VI>X</span></b>
                    </p>
                 </td>
                ';
            }
         ?>
      </tr>
      <?php
         // gen bang 2
         
                       for ($i = 1;$i <= $ds_trang_tin_b2;$i++) {
         
                       ?>
      <tr>
         <td width=56 valign=top style='width:42.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI><?php echo $i ?></span></b></p>
         </td>
         <td width=346 valign=top style='width:269.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b2_'.$i.'" name="ds_trang_tin_b2_'.$i.'" type="text" >'.$_POST['ds_trang_tin_b2_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b2_'.$i]; }?>
         </td>
         <td width=202 valign=top style='width:155.85pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b2_note_'.$i.'" name="ds_trang_tin_b2_note_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b2_note_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b2_note_'.$i]; }?>
         </td>
         <?php
            if ($submitable) {
                echo '
                 <td width=59 valign=top style="width:10pt;border:solid windowtext 1.0pt;
                    border-top:none;padding:0cm 5.4pt 0cm 5.4pt">
                    <p class=MsoNormal align=center style="text-align:center"><b><span lang=VI>
                      <input type="submit" value="x" onclick="javascript: deleteData2(2, '.$ds_trang_tin_b2.', form, '.$i.');">
                    </span></b>
                 </td>
                ';
            }
         ?>
      </tr>
      <?php
         }
         
         ?>
   </table>
   <?php
      if ($submitable) {
          echo '<input type="submit" value="Them hang" onclick="javascript: updateData_2(2, '.$ds_trang_tin_b2.', form);">';
          echo '<input hidden id="ds_trang_tin_b2" name="ds_trang_tin_b2" type="text" value="'.$ds_trang_tin_b2.'" />';
      }
      ?>
   <p class=MsoNormal><span lang=VI>&nbsp;</span></p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>II. TIN T&#7912;C
      TRONG N&#431;&#7898;C</span></b>
   </p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>1. Danh sách
      trang tin</span></b>
   </p>
   <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>STT</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Tên
               t&#7893; ch&#7913;c</span></b>
            </p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>&#272;&#7883;a
               ch&#7881; URL</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>1</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Chuyên trang v&#7873; CNTT c&#7911;a Báo
               &#273;i&#7879;n t&#7917; Infonet - B&#7897; Thông tin và Truy&#7873;n thông</span></b>
            </p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://ictnews.vn">http://ictnews.vn</a></span></b></span></p>
         </td>
      </tr>
      <tr style='height:30.2pt'>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:30.2pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>2</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:30.2pt'>
            <p class=MsoNormal><b><span lang=VI>Ban C&#417; y&#7871;u chính ph&#7911; - B&#7897;
               Qu&#7889;c Phòng</span></b>
            </p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:30.2pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://antoanthongtin.vn">http://antoanthongtin.vn</a></span></b></span></p>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>3</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>C&#7909;c An toàn thông tin – B&#7897;
               Thông tin và Truy&#7873;n thông</span></b>
            </p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://ais.gov.vn">http://ais.gov.vn</a></span></b></span></p>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://ais.gov.vn/tin-tuc-an-toan-thong-tin.htm">http://ais.gov.vn/tin-tuc-an-toan-thong-tin.htm</a></span></b></span></p>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>4</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>B&#7897; Thông tin và Truy&#7873;n thông</span></b></p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://mic.gov.vn">http://mic.gov.vn</a></span></b></span></p>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>5</span></b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Trung tâm &#7912;ng c&#7913;u kh&#7849;n
               c&#7845;p máy tính Vi&#7879;t Nam – B&#7897; Thông tin và Truy&#7873;n thông</span></b>
            </p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI><a
               href="http://www.vncert.gov.vn">http://www.vncert.gov.vn</a></span></b></span></p>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.05pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b>6</b></p>
         </td>
         <td width=240 valign=top style='width:180.0pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b>&nbsp;</b></p>
         </td>
         <td width=223 valign=top style='width:167.35pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><span class=MsoHyperlink><b><span lang=VI>https://securitydaily.net/</span></b></span></p>
         </td>
      </tr>
   </table>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>2. &#272;i&#7875;m
      tin</span></b>
   </p>
   <!-- BANG 3 -->
   <!-- BANG 3 -->
   <!-- BANG 3 -->
   <?php
      for ($i = 1;$i <= $ds_trang_tin_b3;$i++) {
      
      ?>
         <?php
            if ($submitable) {
                echo '
                      <input type="submit" value="x" onclick="javascript: deleteData3(3, '.$ds_trang_tin_b3.', form, '.$i.');">
                ';
            }
         ?>
   <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=56 rowspan=2 style='width:42.3pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>TIN <?php echo $i ?></span></b></p>
         </td>
         <td width=355 valign=top style='width:276.4pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Tiêu
               &#273;&#7873;</span></b>
            </p>
         </td>
         <td width=192 valign=top style='width:148.8pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Ngày
               &#273;&#259;ng</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=355 valign=top style='width:276.4pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b3_tieude_'.$i.'" name="ds_trang_tin_b3_tieude_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b3_tieude_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b3_tieude_'.$i]; }?>
         </td>
         <td width=192 valign=top style='width:148.8pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b3_ngaydang_'.$i.'" name="ds_trang_tin_b3_ngaydang_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b3_ngaydang_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b3_ngaydang_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Mô t&#7843;</span></b></p>
         </td>
         <td width=548 colspan=2 valign=top style='width:425.2pt;border-top:none;
            border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" rows="5" id="ds_trang_tin_b3_mota_'.$i.'" name="ds_trang_tin_b3_mota_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b3_mota_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b3_mota_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=603 colspan=3 valign=top style='width:467.5pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Link tham kh&#7843;o/link g&#7889;c:</span></b></p>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b3_goc_'.$i.'" name="ds_trang_tin_b3_goc_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b3_goc_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b3_goc_'.$i]; }?>
         </td>
      </tr>
   </table>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <?php
      }
      
      if ($submitable) {
          echo '<input type="submit" value="Them hang" onclick="javascript: updateData_3(3, '.$ds_trang_tin_b3.', form);">';
          echo '<input hidden id="ds_trang_tin_b3" name="ds_trang_tin_b3" type="text" value="'.$ds_trang_tin_b3.'" />';
      }
      ?>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>III. TIN T&#7912;C
      N&#431;&#7898;C NGOÀI</span></b>
   </p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>1. Danh sách
      trang tin</span></b>
   </p>
   <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>STT</span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>&#272;&#7883;a
               ch&#7881; URL</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>1</span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>1. http://thehackernews.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>2. https://securelist.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>3. https://www.exploit-db.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>4. http://www.zdnet.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>5. https://threatpost.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>6. http://www.computerworld.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>7. http://www.securityweek.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>8. http://www.theregister.co.uk/security/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>9. https://twitter.com/teamcymru</span></b></p>
            <p class=MsoNormal><b><span lang=VI>10. http://blog.trendmicro.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>11. https://www.symantec.com/security-center</span></b></p>
            <p class=MsoNormal><b><span lang=VI>Ho&#7863;c Tham kh&#7843;o Ph&#7909; l&#7909;c
               </span></b>
            </p>
         </td>
      </tr>
   </table>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>2. &#272;i&#7875;m
      tin</span></b>
   </p>
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <!-- BANG 4 -->
   <?php
      for ($i = 1;$i <= $ds_trang_tin_b4;$i++) {
      
      ?>
         <?php
            if ($submitable) {
                echo '
                      <input type="submit" value="x" onclick="javascript: deleteData3(4, '.$ds_trang_tin_b4.', form, '.$i.');">
                ';
            }
         ?>
   <table autosize="1" class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=56 rowspan=2 style='width:42.3pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>TIN <?php echo $i ?></span></b></p>
         </td>
         <td width=355 valign=top style='width:276.4pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Tiêu
               &#273;&#7873;</span></b>
            </p>
         </td>
         <td width=192 valign=top style='width:148.8pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Ngày
               &#273;&#259;ng</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=355 valign=top style='width:276.4pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b4_tieude_'.$i.'" name="ds_trang_tin_b4_tieude_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b4_tieude_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b4_tieude_'.$i]; }?>
         </td>
         <td width=192 valign=top style='width:148.8pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b4_ngaydang_'.$i.'" name="ds_trang_tin_b4_ngaydang_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b4_ngaydang_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b4_ngaydang_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Mô t&#7843;</span></b></p>
         </td>
         <td width=548 colspan=2 valign=top style='width:425.2pt;border-top:none;
            border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" rows="5" id="ds_trang_tin_b4_mota_'.$i.'" name="ds_trang_tin_b4_mota_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b4_mota_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b4_mota_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=603 colspan=3 valign=top style='width:467.5pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Link tham kh&#7843;o/link g&#7889;c:</span></b></p>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b4_goc_'.$i.'" name="ds_trang_tin_b4_goc_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b4_goc_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b4_goc_'.$i]; }?>
         </td>
      </tr>
   </table>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <?php
      }
      
      if ($submitable) {
          echo '<input type="submit" value="Them hang" onclick="javascript: updateData_4(4, '.$ds_trang_tin_b4.', form);">';
          echo '<input hidden id="ds_trang_tin_b4" name="ds_trang_tin_b4" type="text" value="'.$ds_trang_tin_b4.'" />';
          echo '<p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>';
      }
      ?>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>IV. L&#7894; H&#7892;NG/
      &#272;I&#7874;M Y&#7870;U M&#7898;I</span></b>
   </p>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>1. Danh sách
      trang tin</span></b>
   </p>
   <table autosize="1" class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>STT</span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>&#272;&#7883;a
               ch&#7881; URL</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=59 valign=top style='width:44.35pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>1</span></b></p>
         </td>
         <td width=564 valign=top style='width:423.2pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>1. http://thehackernews.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>2. https://securelist.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>3. https://www.exploit-db.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>4. http://www.zdnet.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>5. https://threatpost.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>6. http://www.computerworld.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>7. http://www.securityweek.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>8. http://www.theregister.co.uk/security/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>9. https://twitter.com/teamcymru</span></b></p>
            <p class=MsoNormal><b><span lang=VI>10. http://blog.trendmicro.com/</span></b></p>
            <p class=MsoNormal><b><span lang=VI>11. https://www.symantec.com/security-center</span></b></p>
            <p class=MsoNormal><b><span lang=VI>Ho&#7863;c Tham kh&#7843;o Ph&#7909; l&#7909;c</span></b></p>
         </td>
      </tr>
   </table>
   <p class=MsoNormal style='margin-left:78.0pt'><b><span lang=VI>2. &#272;i&#7875;m
      tin</span></b>
   </p>
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <!-- BANG 5 -->
   <?php
      for ($i = 1;$i <= $ds_trang_tin_b5;$i++) {
      
      ?>
         <?php
            if ($submitable) {
                echo '
                      <input type="submit" value="x" onclick="javascript: deleteData3(5, '.$ds_trang_tin_b5.', form, '.$i.');">
                ';
            }
         ?>
   <table autosize="1" class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
      style='width:100%;margin-left:0px;border-collapse:collapse'>
      <tr>
         <td width=56 rowspan=2 style='width:42.3pt;border:solid windowtext 1.0pt;
            background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>TIN <?php echo $i ?></span></b></p>
         </td>
         <td width=355 valign=top style='width:276.4pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Tiêu
               &#273;&#7873;</span></b>
            </p>
         </td>
         <td width=192 valign=top style='width:148.8pt;border:solid windowtext 1.0pt;
            border-left:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>Ngày
               &#273;&#259;ng</span></b>
            </p>
         </td>
      </tr>
      <tr>
         <td width=355 valign=top style='width:276.4pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b5_tieude_'.$i.'" name="ds_trang_tin_b5_tieude_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b5_tieude_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b5_tieude_'.$i]; }?>
         </td>
         <td width=192 valign=top style='width:148.8pt;border-top:none;border-left:
            none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b5_ngaydang_'.$i.'" name="ds_trang_tin_b5_ngaydang_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b5_ngaydang_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b5_ngaydang_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=56 valign=top style='width:42.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Mô t&#7843;</span></b></p>
         </td>
         <td width=548 colspan=2 valign=top style='width:425.2pt;border-top:none;
            border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt'>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" rows="5" id="ds_trang_tin_b5_mota_'.$i.'" name="ds_trang_tin_b5_mota_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b5_mota_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b5_mota_'.$i]; }?>
         </td>
      </tr>
      <tr>
         <td width=603 colspan=3 valign=top style='width:467.5pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal><b><span lang=VI>Link tham kh&#7843;o/link g&#7889;c:</span></b></p>
            <?php if ($submitable) {
               echo '<textarea style="width:100%" id="ds_trang_tin_b5_goc_'.$i.'" name="ds_trang_tin_b5_goc_'.$i.'"
                       type="text" >'.$_POST['ds_trang_tin_b5_goc_'.$i].'</textarea>';
               }else{ echo $_POST['ds_trang_tin_b5_goc_'.$i]; }?>
         </td>
      </tr>
   </table>
   <?php
      }
      
      if ($submitable) {
          echo '<input type="submit" value="Them hang" onclick="javascript: updateData_5(5, '.$ds_trang_tin_b5.', form);">';
          echo '<input hidden id="ds_trang_tin_b5" name="ds_trang_tin_b5" type="text" value="'.$ds_trang_tin_b5.'" />';
          echo '<p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>';
      }
      ?>
   <span lang=VI style='font-size:12.0pt;font-family:"Times New Roman",serif'><br
      clear=all style='page-break-before:always'>
   </span>
   <p class=MsoNormal align=left style='margin:0cm;margin-bottom:.0001pt;
      text-align:left;line-height:normal'><span lang=VI>&nbsp;</span></p>
   <p class=MsoNormal align=center style='text-align:center'><b><span lang=VI>PH&#7908;
      L&#7908;C</span></b>
   </p>
   <p class=MsoNormal align=center style='text-align:center'><span lang=VI>CÁC
      TRANG TIN/WEBSITE CUNG C&#7844;P THÔNG TIN V&#7872; AN TOÀN THÔNG TIN</span>
   </p>
   <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 align=left
      width=0 style='width:100%;margin-left:0px;border-collapse:collapse;
      margin-right:6.75pt'>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal align=center style='margin:0cm;margin-bottom:.0001pt;
               text-align:center;line-height:normal'><b><span lang=EN-US>STT</span></b></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border:solid windowtext 1.0pt;
            border-left:none;background:#D9D9D9;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal align=center style='margin:0cm;margin-bottom:.0001pt;
               text-align:center;line-height:normal'><b><span lang=EN-US>&#272;&#7883;a ch&#7881;
               URL</span></b>
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>1.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>https://twitter.com/teamcymru</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>2.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.trendmicro.com/Anti-MalwareBlog/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>3.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.feedburner.com/cnet/tcoc</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>4.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.techworld.com/rss/feeds/techworld-news.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>5.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.f-secure.com/weblog/weblog.rss</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>6.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.zdnet.com/news/rss.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>7.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.feedburner.com/KasperskySafeguardingMe</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>8.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.bbci.co.uk/news/technology/rss.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>9.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
               lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://rss.cnn.com/rss/edition_technology.rss</span></p>
         </td>
      </tr>
      <tr style='height:22.5pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.5pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>10.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:22.5pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.reuters.com/reuters/technologyNews<br>
               http://feeds.reuters.com/reuters/topNews</span>
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>11.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.networkworld.com/rss/netflash.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>12.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.enisa.europa.eu/front-page/RSS</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>13.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.feedburner.com/dhs/zOAi</span></p>
         </td>
      </tr>
      <tr style='height:45.0pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:45.0pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>14.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:45.0pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.nist.gov/rss/electronicsandtelecommunications.xml<br>
               http://www.nist.gov/rss/informationtechnology.xml<br>
               http://www.nist.gov/rss/methods.xml<br>
               http://www.nist.gov/rss/publicsafetyandsecurity.xml</span>
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>15.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://threatpost.com/en_us/rss.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>16.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://thehackernews.com</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>17.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://secunia.com/community/advisories/historic/</span></p>
         </td>
      </tr>
      <tr style='height:22.5pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.5pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>18.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:22.5pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.feedburner.com/SansInstituteNewsbites<br>
               http://feeds.feedburner.com/SansInstituteSecLab</span>
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>19.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.cert.org/nav/cert_announcements.rss</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>20.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://ics-cert.us-cert.gov/xml/rss.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>21.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'>&#31185;&#25216;&#38971;&#36947;<span
               lang=EN-US><br>
               http://www.xinhuanet.com/tech/news_tech.xml<br>
               </span>&#65288;&#12381;&#12398;&#20182;&#12399;&#20197;&#19979;&#12395;&#12354;&#12426;&#12414;&#12377;&#65306;<span
                  lang=EN-US>http://www.xinhuanet.com/rss.htm</span>&#65289;
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>22.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.xinhua.jp/category/rss/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>23.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'>&#20013;&#25991;&#26032;&#32862;<span
               lang=EN-US> - IT</span>&#38971;&#36947;<span lang=EN-US><br>
               http://www.people.com.cn/rss/it.xml<br>
               </span>&#65288;&#12381;&#12398;&#20182;&#12399;&#20197;&#19979;&#12395;&#12354;&#12426;&#12414;&#12377;&#65306;<span
                  lang=EN-US>http://rss.people.com.cn/</span>&#65289;
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>24.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'>&#25991;&#21270;&#31185;&#23398;&#25216;<span
               style='font-family:SimSun'>&#26415;</span><span lang=EN-US style='font-family:
               FangSong'><br>
               </span><span lang=EN-US>http://j.people.com.cn/rss/95952.xml<br>
               </span>&#65288;&#12381;&#12398;&#20182;&#12399;&#20197;&#19979;&#12395;&#12354;&#12426;&#12414;&#12377;&#65306;<span
                  lang=EN-US>http://www.people.com.cn/rss/opml_jp.xml</span>&#65289;
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>25.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://news.searchina.ne.jp/rss/category_rss/it.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>26.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://jp.epochtimes.com/nimpart.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>27.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://japanese.yonhapnews.co.kr/itscience/0600000001.html<br>
               http://japanese.yonhapnews.co.kr/RSS/it.xml&nbsp;&nbsp;&nbsp; --- </span>&#26085;&#26412;&#35486;&#12398;<span
                  lang=EN-US>IT</span>&#12539;&#31185;&#23398;&#12398;<span lang=EN-US>RSS</span>&#12501;&#12451;&#12540;&#12489;<span
                  lang=EN-US><br>
               http://www.yonhapnews.co.kr/RSS/economy.xml&nbsp; ---</span>&#12495;&#12531;&#12464;&#12523;&#35486;<span
                  lang=EN-US>-</span>&#32076;&#28168;&#12398;&#19968;&#37096;&#12392;&#12375;&#12390;<span
                  lang=EN-US>IT</span>
            </p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>28.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://japanese.donga.com/list/home_list.html</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>29.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.aljazeera.com/Services/Rss/?PostingId=2007731105943979989</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>30.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://krebsonsecurity.com/feed/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>31.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://rss.cnn.com/rss/money_technology.rss</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US
               style='font-size:11.0pt'>32.</span><span lang=EN-US style='font-size:7.0pt'>&nbsp;
               </span><span lang=EN-US style='font-size:11.0pt'>&nbsp;</span>
            </p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US style='font-size:11.0pt'>http://thediplomat.com/feed/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>33.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://dankaminsky.com/feed/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>34.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://news.softpedia.com/newsRSS/Global-0.xml</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>35.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>https://nakedsecurity.sophos.com/feed/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>36.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://feeds.feedburner.com/PaloAltoNetworks</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>37.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>https://securelist.com/feed/</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>38.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://www.theregister.co.uk/security/headlines.atom</span></p>
         </td>
      </tr>
      <tr style='height:11.25pt'>
         <td width=75 valign=top style='width:56.3pt;border:solid windowtext 1.0pt;
            border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoListParagraph align=center style='margin-top:0cm;margin-right:
               0cm;margin-bottom:0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:
               center;text-indent:-18.0pt;line-height:normal'><span lang=EN-US>39.</span><span
               lang=EN-US style='font-size:7.0pt'>&nbsp; </span><span lang=EN-US>&nbsp;</span></p>
         </td>
         <td width=1201 wrap style='width:900.5pt;border-top:none;border-left:none;
            border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
            padding:0cm 5.4pt 0cm 5.4pt;height:11.25pt'>
            <p class=MsoNormal style='margin:0cm;margin-bottom:.0001pt;line-height:normal'><span
               lang=EN-US>http://blog.talosintel.com/feeds/posts/default</span></p>
         </td>
      </tr>
   </table>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <p class=MsoNormal><b><span lang=VI>&nbsp;</span></b></p>
   <p class=MsoNormal><b>&nbsp;</b></p>
</div>
<div>
</div>
<?php if ($submitable) {
   echo '</form>';
   }
   ?>