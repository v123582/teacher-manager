$(document).ready(function(){
	var $file = new file();

	function file(){
		// 建構子
		_setListen();
		$("#file_create_modal .input-file").val("");

		function _setListen(){
			$("#file_create_div").on("click", "#a_file_create", function(){ _clickAFileCreate(); });
			$("#file_create_modal").on("click", ".btn-file" , function(){ _clickBtnFile( $(this) ); });
			$("#file_create_modal").on("click", ".input-file" , function(){ _fileCreateInit($(this).parents("form")); });
		}
		function _fileCreateInit($form){
			// 初始化進度條
			$form.find(".progress-bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar");
			$form.find(".progress-bar").css("width", "0%");
			$form.find(".progress-num").html( 0+"%" );
			// disable上傳按鈕
			$form.find(".btn-file").prop("disable", true);
			$form.find(".btn-file").toggle(true);
		}
		// 監聽event
		function _clickAFileCreate(){

			$("#file_create_modal").modal("show");
		}
		function _clickBtnFile( $btn ){
			var $form  		= $btn.parents("form");
			var file_name  	= $form.find(".input-file").val().trim();console.log(file_name, $form);

			// 判斷使用者是否有選擇上傳的檔案
			if( file_name!="" || file_name ){
				// 非空值，執行上傳動作
				_fileCreate( file_name,$form );
			}
			else{
				console.log("no file");
			}
		}
		// 功能
		function _fileCreate( file_name,$form ){
			var form_data = new FormData( $form[0] );
			var request   = new XMLHttpRequest();

		  	// 初始化進度條
		  	_fileCreateInit($form)
		 	
		 	// 監聽上傳進度	
			request.upload.addEventListener('progress', function(e){
				var percent = Math.round(e.loaded/e.total *100);
				console.log("上傳：", percent);

				//$form.find(".file-loaded").html( Math.round(e.loaded/10000)/100 ); // 已上傳Mb
				//$form.find(".file-total" ).html( Math.round(e.total /10000)/100 ); // 實際Mb
				$form.find(".progress-bar").css("width", percent+"%");
				$form.find(".progress-num").html( percent+"%" );
			});

		  	// 監聽上傳完成
			request.addEventListener('load', function(e){
				console.log("完成：", e);

				$form.find(".progress-bar").removeClass("progress-bar-info").addClass("progress-bar-success");
				// $form.find(".btn-file").remove();
				 $form.find(".btn-file").toggle(false);
			});

		  	// 監聽取消btn
		  	// $form.on("click", ".btn-cancel", function(){
		  	// 	request.abort();

		  		$form.find(".progress-bar")
					// .removeClass("progress-bar-info")
					// .addClass("progress-bar-danger");
		  	// });

		  	// 送出
			// request.open("post", "/file/fileUpload");// open("post||get", "url路徑" )
			// request.send(form_data);
			// console.log(request);
			request.open("POST", '/file/fileUpload', true);
			request.onreadystatechange = function() {
			  if (request.readyState === 4)  {
			    $("#link").val(request.responseText);
			    $("#previewImg").attr("src", request.responseText);
			  }
			};

			request.send(form_data);
			// $.ajax({
			// 	url:"/file/fileUpload",
			// 	data: form_data,
			// 	type : "POST",
			// 	contentType: false,
   //  			processData: false,
			// 	success:function(response){
			// 		console.log(response);
			// 		// $("#link").val(response);
			// 		console.log(response)
			//     }
			// });
		}
	}
});
