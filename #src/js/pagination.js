// === работа с пагинацией 
var numRows = 10; // количество записей всего
pagination = ".info-block__pagination";

function paginationFunc(currentPage) {
	var totalPages; // для подсчета кол-ва страниц всего
	totalPages = Math.ceil(numRows / limit);

	$(pagination).empty();
	if (currentPage > 1) {
		htmlCode = '<div class="pagination__nav-item"><a class="nav-link" onclick="paginationFunc(1);"> |< </a></div>';
		$(pagination).append(htmlCode);
		htmlCode = '<div class="pagination__nav-item"><a class="nav-link" onclick="paginationFunc(' + (+currentPage - +1) + ');"> <<< </a></div>';
		$(pagination).append(htmlCode);
	}
	//  если страниц меньше чем limit то делаем просто вывод 5 и меньше без точек 

	if (numRows > limit * 5) {
		// т.е. єлементов 31 и больше - хватает на limit страниц вывода 
		if (totalPages - currentPage < 5) {
			// текущая страница уже близко к последней, ... выводить не надо
			countPage = totalPages - 5;
			while (countPage <= totalPages) {
				htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link ' + ((currentPage == countPage) ? '_active' : '') + '" onclick="paginationFunc(' + countPage + ');">' + countPage + '</a></span></div>';
				$(pagination).append(htmlCode);
				countPage++;
			}
		} else {
			// вариант когда нужны "..."
			if (currentPage > 1) {
				// обычный вариант
				countPage = currentPage - 1;
				countPageI = 1;
				while (countPageI <= limit) {
					if (countPageI <= 3) {
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link ' + ((currentPage == countPage) ? '_active' : '') + '" onclick="paginationFunc(' + countPage + ');">' + countPage + '</a></span></div>';
						$(pagination).append(htmlCode);
					}
					if (countPageI == 4) {
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link">...</a></span></div>';
						$(pagination).append(htmlCode);
					}
					if (countPageI == limit) {
						// последняя страница
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link" onclick="paginationFunc(' + totalPages + ');">' + totalPages + '</a></span></div>';
						$(pagination).append(htmlCode);
					}
					countPage++;
					countPageI++;
				}
			} else {
				// первая страница
				countPage = 1;
				while (countPage <= limit) {
					if (countPage <= 3) {
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link ' + ((currentPage == countPage) ? '_active' : '') + '" onclick="paginationFunc(' + countPage + ');">' + countPage + '</a></span></div>';
						$(pagination).append(htmlCode);
					}
					if (countPage == 4) {
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link">...</a></span></div>';
						$(pagination).append(htmlCode);
					}
					if (countPage == limit) {
						// последняя страница
						htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link" onclick="paginationFunc(' + countPage + ');">' + countPage + '</a></span></div>';
						$(pagination).append(htmlCode);
					}
					countPage++;
				}
			}
		}
	} else {
		// страниц меньше чем limit и мы делаем просто 1, 2, 3, ....
		countPage = 1;
		while (countPage <= Math.ceil(numRows / limit)) {
			htmlCode = '<div class="pagination__nav-item"><span class="align-middle"><a class="nav-link ' + ((currentPage == countPage) ? '_active' : '') + '" onclick="paginationFunc(' + countPage + ');">' + countPage + '</a></span></div>';
			$(pagination).append(htmlCode);
			countPage++;
		}
	}

	if (currentPage < totalPages) {
		htmlCode = '<div class="pagination__nav-item"><a class="nav-link" onclick="paginationFunc(' + (+currentPage + +1) + ');"> >>> </a></div>';
		$(pagination).append(htmlCode);
		htmlCode = '<div class="pagination__nav-item"><a class="nav-link" onclick="paginationFunc(' + totalPages + ');"> >| </a></div>';
		$(pagination).append(htmlCode);
	}

	getListPlants(currentPage);
}
