function validate()
		{
			if (document.myForm.name.value == "")
			{
				alert("Vui lòng nhập họ tên của bạn");
				document.myForm.name.focus();
				return false;
			}

			if (document.myForm.gender.value == "")
			{
				alert("Vui lòng chọ giới tính");
				document.myForm.gender.focus();
				return false;
			}

			if (document.myForm.password.value == "")
			{
				alert("Vui lòng nhập mật khẩu bạn muốn tạo");
				document.myForm.password.focus();
				return false;
			}

			if (document.myForm.mobile.value == "")
			{
				alert("Vui lòng nhập số điện thoại đăng kí");
				document.myForm.mobile.focus();
				return false;
			}

			if (document.myForm.email.value == "")
			{
				alert("Vui lòng nhập email của bạn");
				document.myForm.txtmail.focus();
				return false;
			}

			if (document.myForm.address.value == "")
			{
				alert("Vui lòng nhập địa chỉ");
				document.myForm.address.focus();
				return false;
			}

			if (document.myForm.dob.value == "")
			{
				alert("Vui lòng chọn ngày tháng năm sinh");
				document.myForm.dob.focus();
				return false;
			}
		}
