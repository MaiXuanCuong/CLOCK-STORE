// This file can be replaced during build by using the `fileReplacements` array.
// `ng build` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

let urlApi = 'http://127.0.0.1:8000/api/auth/';
export const environment = {
  production: false,
  url:'http://127.0.0.1:8000/',
  urlAllProducts : urlApi+'product_list',
  urlIdProduct : urlApi+'product_detail',
  urlAddToCart : urlApi+'add-to-cart/',
  urlGetAllCart : urlApi+'list-cart',
  urlUpdateCart : urlApi+'update-cart/',
  urlDeleteCart : urlApi+'remove-to-cart/',
  urlDeleteAllCart : urlApi+'remove-all-cart',
  urlCreateOrder : urlApi+'order/create',
  urlGetAllProvince : urlApi+'order/list-province',
  urlGetAllDistrictByProvince : urlApi+'order/list-district/',
  urlGetAllWardByDistrict : urlApi+'order/list-ward/',
  urlOrderStore : urlApi+'order/store',
  urlOrderShow : urlApi+'order/show/',

  urlAddToCartByLike : urlApi+'add-to-cart-by-like/',
  urlDeleteCartByLike : urlApi+'remove-to-cart-by-like/',
  urlGetAllCartByLike : urlApi+'list-cart-by-like',
  urlProfile: urlApi+'profile',
  urlListOrder: urlApi+'listorder/',
  urlChangePassByMail: urlApi+'change-pass-mail',
  urlChangePass: urlApi+'change-pass',
  


  urlAllCategories : urlApi+'category_list',
  urlTrendingPro : urlApi+'trendingProduct',
  urlRegister : urlApi+'register',
  urlLogin : urlApi+'login-customer',
  urlLogout : urlApi+'logout',
  urlCustomer : urlApi+'getCustomer',
  urlGetAllBrand : urlApi+'brand_list',
  urlGoogleLogin : 'http://127.0.0.1:8000/auth/redirect/google',
  urlSearch : urlApi,
  urlAllImage : urlApi + 'product_images'

};

/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/plugins/zone-error';  // Included with Angular CLI.
