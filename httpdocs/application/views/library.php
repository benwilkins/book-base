<p id="instructions">
	Click a header to sort the list.
</p>

<table id="library">
	<thead>
		<tr>
			<th class="reading_level"><a href="/home?sort=reading_level">Reading Level</a></th>
			<th class="title"><a href="/home?sort=title">Title</a></th>
			<th class="genre"><a href="/home?sort=genre">Genre</a></th>
			<th class="inventory"><a href="/home?sort=inventory">Inventory</a></th>
			<th class="notes"><a href="/home?sort=notes">Notes</a></th>
		</tr>
	</thead>
	<tbody>

		<? foreach( $books as $book ) : ?>
		<tr>
			<td class="reading_level"><?=$book->reading_level?></td>
			<td class="title"><?=$book->title?></td>
			<td class="genre"><?=$book->genre?></td>
			<td class="inventory"><?=$book->inventory?></td>
			<td class="notes"><?=$book->notes?></td>
		</tr>
		<? endforeach; ?>

	</tbody>
</table>