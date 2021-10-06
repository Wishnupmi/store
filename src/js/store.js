
import { createStore } from 'framework7';


const store = createStore({
  // request: {
  // //   $f7.request.json('http://localhost/formlogin/login.php')
  // //   .then(function (res) {
  // // console.log(res.data);
  // //   });
  // //       }
  // }
  state: {
    loading: false,
    products: [],
    // products: [
    //   {
    //     id: '1',
    //     title: 'Apple iPhone 8',
    //     description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis.'
    //   },
    // ]
  },
  getters: {
    products({ state }) {
      // return state.products;
      state.loading = true;
      setTimeout(() => {
        // state.products = [{id:'1',title: 'Apple iPhone 1'}, {id:'2',title: 'Apple iPhone 2'}, {id:'3',title: 'Apple iPhone 3'}, {id:'4',title: 'Apple iPhone 4'},];
        fetch('http://localhost/formlogin/login.php')
        .then((res) => res.json())
        .then((products) => {
          state.products = products;
        })
        state.loading = false;
      }, 3000);
      return state.products;
    }
  },
  actions: {
    addProduct({ state }, product) {
      state.products = [...state.products, product];
    },
  },
})
export default store;

