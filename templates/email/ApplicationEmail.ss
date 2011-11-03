<html>
<head>
	<title></title>
	<style>
		body{
			background: url({$BaseHref}job_postings/images/backgroun.jpg) left top repeat;
		}
		#main{
			
		}
		#info{
			border: solid 1px #444;
			background: #dfdfdf;
		}
		span{
			color: #ccc;
			font-style: italic;
			font-size: 12px;
		}
	</style>
</head>
<body>

	<table width="560" align="center" id="main" cellpadding="0" cellspacing="0">
		<tr>
			<td><h1>Dynamic Online Application</h1></td>
		</tr>
		<tr>
			<td>
				<table id="info" cellpadding="0" cellspacing="0">
					<tr>
						<td>First Name:</td>
						<td>$FirstName</td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td>$LastName</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>$Email</td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><% if Phone %>$Phone<% else %><span>Phone number not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>About $FirstName $LastName:</td>
						<td><% if Bio %>$Bio<% else %><span>Information not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Skills:</td>
						<td><% if Skills %>$Skills<% else %><span>Skills not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Site 1:</td>
						<td><% if Site1 %><a href="http://$Site1">$Site1</a><% else %><span>Site 1 not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Site 2:</td>
						<td><% if Site2 %><a href="http://$Site2">$Site2</a><% else %><span>Site 2 not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Site 3:</td>
						<td><% if Site3 %><a href="http://$Site3">$Site3</a><% else %><span>Site 3 not provided</span><% end_if %></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</body>
</html>