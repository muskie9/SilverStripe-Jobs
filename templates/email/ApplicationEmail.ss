<html>
<head>
	<title></title>
</head>
<body>

	<table width="560" align="center">
		<tr>
			<td><h1>Dynamic Online Application</h1></td>
		</tr>
		<tr>
			<td>
				<table>
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
						<td><% if Site1 %>$Site1<% else %><span>Site 1 not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Site 2:</td>
						<td><% if Site2 %>$Site2<% else %><span>Site 2 not provided</span><% end_if %></td>
					</tr>
					<tr>
						<td>Site 3:</td>
						<td><% if Site3 %>$Site3<% else %><span>Site 3 not provided</span><% end_if %></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</body>
</html>