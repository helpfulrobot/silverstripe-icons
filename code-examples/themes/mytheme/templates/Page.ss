<!DOCTYPE html>
<html>
	<body>
		<% if $MyIcon %>
			<% with $MyIcon %><% include Icon %><% end_with %>
		<% end_if %>
		$Layout
	</body>
</html>