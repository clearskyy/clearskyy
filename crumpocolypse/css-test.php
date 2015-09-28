<?PHP
	session_start();
?>

<!doctype html><html><head>
	<? require '../crumpocolypse/header.php' ?>
<title>CSS Test | clearskyy </title>
</head><body>
	<? include '../crumpocolypse/menu.php' ?>
	
<div id="nexus">
	<div id="wrap-left">
		<div class="content">
		<!-- Sample Content to Plugin to Template -->
		<h1>CSS Basic Elements</h1>

		<p>The purpose of this HTML is to help determine what default settings are with CSS and to make sure that all possible HTML Elements are included in this HTML so as to not miss any possible Elements when designing a site.</p>

		<hr />

		<h1 id="headings">Headings</h1>

		<h1>Heading 1</h1>
		<h2>Heading 2</h2>
		<h3>Heading 3</h3>
		<h4>Heading 4</h4>
		<h5>Heading 5</h5>
		<h6>Heading 6</h6>

		<small><a href="#wrapper">[top]</a></small>
		<hr />


		<h1 id="paragraph">Paragraph</h1>

		<img style="width:250px;height:125px;float:right" src="images/css_gods_language.png" alt="CSS | God's Language" />
		<p>Lorem ipsum dolor sit amet, <a href="#" title="test link">test link</a> adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>

		<p>Lorem ipsum dolor sit amet, <em>emphasis</em> consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>

		<small><a href="#wrapper">[top]</a></small>
		<hr />

		<h1 id="list_types">List Types</h1>

		<h3>Definition List</h3>
		<dl>
			<dt>Definition List Title</dt>
			<dd>This is a definition list division.</dd>
		</dl>

		<h3>Ordered List</h3>
		<ol>
			<li>List Item 1</li>
			<li>List Item 2</li>
			<li>List Item 3</li>
		</ol>

		<h3>Unordered List</h3>
		<ul>
			<li>List Item 1</li>
			<li>List Item 2</li>
			<li>List Item 3</li>
		</ul>

		<small><a href="#wrapper">[top]</a></small>
		<hr />

		<h1 id="form_elements">Fieldsets, Legends, and Form Elements</h1>

		<fieldset>
			<legend>Legend</legend>
			
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.</p>
			
			<form>
				<h2>Form Element</h2>
				
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui.</p>
				
				<p><label for="text_field">Text Field:</label><br />
				<input type="text" id="text_field" /></p>
				
				<p><label for="text_area">Text Area:</label><br />
				<textarea id="text_area"></textarea></p>
				
				<p><label for="select_element">Select Element:</label><br />
					<select name="select_element">
					<optgroup label="Option Group 1">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</optgroup>
					<optgroup label="Option Group 2">
						<option value="1">Option 1</option>
						<option value="2">Option 2</option>
						<option value="3">Option 3</option>
					</optgroup>
				</select></p>
				
				<p><label for="radio_buttons">Radio Buttons:</label><br />
					<input type="radio" class="radio" name="radio_button" value="radio_1" /> Radio 1<br/>
						<input type="radio" class="radio" name="radio_button" value="radio_2" /> Radio 2<br/>
						<input type="radio" class="radio" name="radio_button" value="radio_3" /> Radio 3<br/>
				</p>
				
				<p><label for="checkboxes">Checkboxes:</label><br />
					<input type="checkbox" class="checkbox" name="checkboxes" value="check_1" /> Radio 1<br/>
						<input type="checkbox" class="checkbox" name="checkboxes" value="check_2" /> Radio 2<br/>
						<input type="checkbox" class="checkbox" name="checkboxes" value="check_3" /> Radio 3<br/>
				</p>
				
				<p><label for="password">Password:</label><br />
					<input type="password" class="password" name="password" />
				</p>
				
				<p><label for="file">File Input:</label><br />
					<input type="file" class="file" name="file" />
				</p>
				
				
				<p><input class="button" type="reset" value="Clear" /> <input class="button" type="submit" value="Submit" />
				</p>
				

				
			</form>
			
		</fieldset>

		<small><a href="#wrapper">[top]</a></small>
		<hr />

		<h1 id="tables">Tables</h1>

		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Table Header 1</th><th>Table Header 2</th><th>Table Header 3</th>
			</tr>
			<tr>
				<td>Division 1</td><td>Division 2</td><td>Division 3</td>
			</tr>
			<tr class="even">
				<td>Division 1</td><td>Division 2</td><td>Division 3</td>
			</tr>
			<tr>
				<td>Division 1</td><td>Division 2</td><td>Division 3</td>
			</tr>

		</table>

		<small><a href="#wrapper">[top]</a></small>
		<hr />

		<h1 id="misc">Misc Stuff - abbr, acronym, pre, code, sub, sup, etc.</h1>

		<p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. <cite>cite</cite>. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.  <abbr title="Avenue">AVE</abbr></p>

		<pre><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.  <abbr title="Avenue">AVE</abbr></p></pre>

		<blockquote>
			"This stylesheet is going to help so freaking much." <br />-Blockquote
		</blockquote>

		<small><a href="#wrapper">[top]</a></small>
		
			<p><a href="#">This is a text link</a></p>  
			<p><strong>Strong is used to indicate strong importance</strong></p>  
			<p><em>This text has added emphasis</em></p>  
			<p>The <b>b element</b> is stylistically different text from normal text, without any special importance</p>  
			<p>The <i>i element</i> is text that is set off from the normal text</p>  
			<p>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation</p>  
			<p><del>This text is deleted</del> and <ins>This text is inserted</ins></p>  
			<p><s>This text has a strikethrough</s></p>  
			<p>Superscript<sup>sup></p>  
			<p>Subscript for things like H<sub>2</sub>O</p>  
			<p><small>This small text is small for for fine print, etc.</small></p>  
			<p>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></p>  
			<p>Keybord input: <kbd>Cmd</kbd></p>  
			<p><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation</q></p>  
			<p><cite>This is a citation</cite>  </p>
			<p>The <dfn>dfn element</dfn> indicates a definition.</p>  
			<p>The <mark>mark element</mark> indicates a highlight</p>  
			<p><code>This is what inline code looks like.</code></p>  
			<p><samp>This is sample output from a computer program</samp></p>  
			<p>The <var>variarble element</var>, such as <var>x</var> = <var>y</var></p> 
		
		</div>
	</div>
</div>

</body></html>
