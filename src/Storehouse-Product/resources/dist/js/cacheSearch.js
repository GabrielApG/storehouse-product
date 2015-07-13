angular.module('cacheSearch',[]);

angular.module('cacheSearch').service('Search',['$http', function ($http) {
	var queries = [];
	return {

		/**
		 * busca dados
		 * @param  string url
		 * @param  string q
		 * @param  bool cache
		 * @return json
		 */
		filter: function (url, q, cache) {
			var query = queryWith(q);
			if (cache===undefined) {
				cache=true;
			}
			return $http({
				url: url + query,
				cache: cache
			});
		}
	};

	/**
	 * Cache de string de consulta
	 * @param  string name
	 * @param  string query
	 * @return string
	 */
	function queryWith(query) {
		for (var i = 0, len = queries.length; i < len; i++) {
			if (query.lastIndexOf(queries[i], 0) === 0) {
			  return queries[i];
			}
		}
		queries.push(query);
		return query;
	}
}]);
