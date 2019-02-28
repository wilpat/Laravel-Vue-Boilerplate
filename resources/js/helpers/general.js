export function initialize(store, router){
	router.beforeEach((to, from, next) => {
	const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
	const user = store.state.user;
	
	if(requiresAuth && !user){
		next('/login');
	}else if(to.path == '/login' && user){
		next('/');
	}else{
		next();
	}
});

// If the token expires, set the addres that the user tried accessing
axios.interceptors.response.use(null, (error) =>{
	if(error.response.status == 401){
		localStorage.removeItem("last_url");
		localStorage.setItem("last_url", window.location.pathname);
		store.commit('logout');
		router.push('/login');

	}

	return Promise.reject(error);
});

if(store.getters.user != null){
	axios.defaults.headers.common["Authorization"] = `Bearer ${store.getters.user.token}`;
}



}