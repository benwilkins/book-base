BOOKS.pages.home =  {
	init: function() {
		var self = BOOKS.pages.home;
		// $('a.sorter').click(self.sort_list);
	},
	
};

(function() {
	function _shouldInit(segmentsArray) {
		if (!segmentsArray
		  || segmentsArray[1].toLowerCase() == "home"
		  || segmentsArray[1] == '') {
			BOOKS.pages.home.init();
		}
	};
	BOOKS.loader.registerCallback(BOOKS.loader.notifications.pageInit, 
		function(eventData, segmentsArray) {
			_shouldInit(segmentsArray);
		}
	);
})();