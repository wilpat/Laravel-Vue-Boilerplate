/* eslint-disable */

import objCodec from 'object-encode';
let encryption_key = ')*myNewAWESOME-mmencryption_key254@%^&%'; // Your encrytion key
import {getLocalUser} from "./helpers/auth";

let user = null;
if(getLocalUser() == null){
	user = null;
	// console.log(1)
}else{
	user = objCodec.decode_object(getLocalUser(), 'base64', encryption_key );
	// console.log(user)
}


export default {
	state:{
	  user
	},

	mutations:{
		logout(state){
			localStorage.removeItem("user")
			state.user = null
			window.location = ''
		},

		loginSuccess(state, payload){

			//This is gotten from responst of the frontends request to the login fxn in auth.js
			state.currentUser = Object.assign({}, payload.user, {token: payload.access_token}, {time: payload.expires_in});
			localStorage.setItem("user", JSON.stringify(objCodec.encode_object( state.currentUser, 'base64', encryption_key )));

		},

	},

	getters:{
		user(state){
			return state.user;
		},
	}
}