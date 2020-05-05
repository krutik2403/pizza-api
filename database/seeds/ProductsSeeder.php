<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
        		'name' 				=> 'Margherita',
        		'description' 		=> 'A classic delight with 100% Real mozzarella cheese',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/new_margherita_2502.jpg',
        	],
        	[
        		'name' 				=> 'Cheese n Corn',
        		'description' 		=> 'Sweet & Juicy Golden corn and 100% real mozzarella cheese in a delectable combination !',
        		'price' 			=> 20,        		
        		'image' 			=> 'https://images.dominos.co.in/new_cheese_n_corn.jpg',
        	],
        	[
        		'name' 				=> 'Cheese n Tomato',
        		'description' 		=> 'A delectable combination of cheese and juicy tomato',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/cheese_and_tomato.png',
        	],
        	[
        		'name' 				=> 'Achari Do Pyaza',
        		'description' 		=> 'Tangy & spicy achari flavours on a super cheesy onion pizza- as desi as it gets!',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/updated_achari_do_pyaza.jpg',
        	],
        	[
        		'name' 				=> 'Double Cheese Margherita',
        		'description' 		=> 'A classic delight loaded with extra 100% real mozzarella cheese',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/double_cheese_margherita_2502.jpg',
        	],
        	[
        		'name' 				=> 'Fresh Veggie',
        		'description' 		=> 'Delectable combination of onion & capsicum, a veggie lovers pick',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/new_fresh_veggie.jpg',
        	],
        	[
        		'name' 				=> 'Paneer Makhani',
        		'description' 		=> 'Flavorful twist of spicy makhani sauce topped with paneer & capsicum',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/updated_paneer_makhani.jpg',
        	],
        	[
        		'name' 				=> 'Golden Corn',
        		'description' 		=> 'Sweet & juicy golden corn for that lipsmacking taste',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/pizza_mania_golden_corn.png',
        	],
        	[
        		'name' 				=> 'Capsicum',
        		'description' 		=> 'Fresh & crisp capsicum for the perfect crunch in pizza',
        		'price' 			=> 10,        		
        		'image' 			=> 'https://images.dominos.co.in/pizza_mania_capsicum.png',
        	],
        ];

        foreach ($products as $product) {
        	Product::firstorcreate($product);
        }
    }
}
