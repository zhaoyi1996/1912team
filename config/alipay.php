<?php 
return [
	//应用ID,您的APPID。
		'app_id' => "2016102300743782",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAq4ulTrbabBpeFb+yGr+iLthKKnSI53Xo7za7hetHU92PY+u5H2zOOVl8ebSMhVUtoab4bTYiIzaQco9WiMrPpyNrPftv3oIyj1CjWmsHjc2OwMc5qyIlNiPbFhP48Ua9MqtuhCla4Bqw/zyMep1wDeAap5wLy7LpF8oMo6gVDLZHTL+oPi+RU6pAMtRFHIzwp3NwSrhZ+fzMFG9c0L7NXe9MowGY1sigtz1WGHPiyK2wBooaqljgoL7p08XvrbaEdu/Xoex/VU/efvzYD9SECE65r2fbOzJkMC0Q9JMyCaCHZXp6TECa+2e2/JwS7G4ZmAqn5J2TMmDHzBkrkCtJnQIDAQABAoIBAC3kAaj5CZ15wEmZKpA1S7G0csLAwg8JX/L+dVPyCPbKgp18Zd2eQdzdr4rvXdgdXUOtYy/0F1XMNwAukDuv5bUUqI/AP8EKm3PzYn/BuheZMeMoaKj7TXEaTnWtih8hiWOQsNPyLDlfapIdJId4ro1Hslm8SPuJNQoEJzVwtZDckUsIz4hSZ3pu6mtrdpRYPFpv8jW0Jk8ww8D1L3DJHnv5PZrjJwRTZSESGUT567MVIAXcDqxm+ZbHK5Zz1v4jzf0guRH3Ug2apbMfYTb7sgz1ltwu9IA4YGwoH2kK/b74eQALj12JRKqD4NaOpJROpvfTEOMU7JjelSM6PnEJZIECgYEA7rqYWddFwUiD3g4nbl+jQltPZSNMsIh1r8vAvKOnC22fdaRktj/F2Q2MlMT3EkFCTyoJ4KqJFrjZ8MDI5dLvobtAZsoFeT943UWjH4Y3oIrrmjoj7JQPQ2pHUHT/Rk0aZ/aMU9hTSBjbygODgqPTiBDlVnhpDriK15kHbpnJSgUCgYEAt/TF50vXpp7T11U+IKBPeZMo8LrOfLaFQcGhXILxkdp4s7bvj/NvR6B5LO0cbq6KWO7IAGccRf8DQHuaxqg2rPwRtV/eje14Vh9m24wrY0abMlswagWCykOGJS0DUlRozXrlR+eBlpUXHsJRO0H04IRe9LLaDIoGy8kCpQafXLkCgYADRHiLWj/xKk3rvyPZBeQVJ2zJxJbrH6MEufQ0YMULif+Ru6NJP0w08VOIQb3j+RKwRLIH6i2gKv2IpwrY4m83NnnmLkOu6ih8VtSpvMuMHfqljMArH8eps42wUzmfO7Tt0VkQWLijFvwDItMs+ZMOnLSW32UIt4vm8YhBgkdYBQKBgDMCiAJMUJ9eeYXDmHe5nHAs83RViL6iai9CvzkFAnGccE39U07KhTgKcq+XjIPQmIJyrDkYXom2XjN6Uv/1UzwCpfJyhCc9C1puWLpWkw1zXcPH75PmtU7bDI6wfbRNvcYE5yFaO+ACtaeM4LOa5YmAi0g1dCt39sx5j+cs//HZAoGBAIaD0SIcDSCjHKunLBvxDdeqzmyyQcytrI1d5vHFIF0F4u80eqfZUN0AAIiOHWdNoXCoR6gPo7eLdj/sI8FUdB6AkHYYaCPhm1m59f/g8M/i3KRnIJq8dY5Nh+wN9GkLvcYpUhaHqqtW2SbipEPPhwayQB7/LKrOln5nCxr7uThu",
		
		//异步通知地址
		'notify_url' => "http://localhost/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.1912team.com/order/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzHsvbNIAvZ95GwLR/0CkWGxI+OQlKNTM0DsQUwwothzrFIWvoBq2v1RpTefpvPsw5y4Oalq25lt41K4rs74HkHYk9dsdffE3t8xrngipr7IKmOxT+a6AAEkoNFwTxPT/Km/E3bFKTEs0alQPGIOYIRR40efWmEitCpQF/NN/nysP1dxE0QsN7ToFY7lssj3R2syeRaQX0RDwMak8GZHj4T6xeKOx4BPN8ymW9AoSYbo4PxIHDFUR310W95zj0fVVeTggnKt/oGLZBhCxxJEBwumVQnGdd9eGbKe5RZ2ZEcJH0j8RKZxrn5PguiU9kR9IpRwAIAmbbXfBYg+uTZWmhQIDAQAB",
		
];




 ?>