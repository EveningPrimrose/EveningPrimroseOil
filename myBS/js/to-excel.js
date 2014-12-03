 function exportToExcel(tableid){
       var curTbl = document.getElementById(tableid);
       var oXL;
       try{
                oXL = new ActiveXObject("Excel.Application"); //创建AX对象excel 
       }catch(e){
                alert("无法启动Excel!\n\n如果您确信您的电脑中已经安装了Excel，"+"那么请调整IE的安全级别。\n\n具体操作：\n\n"+"工具 → Internet选项 → 安全 → 自定义级别 → 对没有标记为安全的ActiveX进行初始化和脚本运行 → 启用");
                return false;
       }
       var oWB = oXL.Workbooks.Add(); //获取workbook对象
       var oSheet = oWB.ActiveSheet;//激活当前sheet 
       var sel = document.body.createTextRange();
       sel.moveToElementText(curTbl); //把表格中的内容移到TextRange中
       sel.select(); //全选TextRange中内容 
       sel.execCommand("Copy");//复制TextRange中内容 
       oSheet.Paste();//粘贴到活动的EXCEL中
       oXL.Visible = true; //设置excel可见属性
       var fname = oXL.Application.GetSaveAsFilename("将table导出到excel.xls", "Excel Spreadsheets (*.xls), *.xls");
       oWB.SaveAs(fname);
       oWB.Close();
       oXL.Quit();
        }




function method2(tableid) //读取表格中每个单元到EXCEL中 
{ 
    var curTbl = document.getElementById(tableid); 
     var oXL = new ActiveXObject("Excel.Application"); 
     //创建AX对象excel 
     var oWB = oXL.Workbooks.Add(); 
     //获取workbook对象 
    var oSheet = oWB.ActiveSheet; 
    //激活当前sheet 
     var Lenr = curTbl.rows.length; 
     //取得表格行数 
     for (i = 0; i < Lenr; i++) 
     { 
         var Lenc = curTbl.rows(i).cells.length; 
         //取得每行的列数 
         for (j = 0; j < Lenc; j++) 
         { 
             oSheet.Cells(i + 1, j + 1).value = curTbl.rows(i).cells(j).innerText; 
             //赋值 
         } 
     } 
     oXL.Visible = true; 
     //设置excel可见属性 
}
