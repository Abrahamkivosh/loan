<?php

use Illuminate\Database\Seeder;

class BankSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Bank::create([
            'name' => 'Barclays Bank of Kenya',
            'image' => "bank.jpg",
            'description' =>"Barclays Bank Kenya started its operations in the country in 1916, making it also one of the oldest banks in Kenya. It is also one of the leading banks in terms of international and domestic resources, as well as in terms of financial strength. It provides a range of products and services including loans, savings, credit cards, mortgages, and investments to individuals and small and large business customers. Based in Nairobi,  the bank operates as a subsidiary of UK-based Barclays Bank."
            ]);
            App\Bank::create([
                'name' => 'Standard Chartered Bank Kenya',
                'image' => "bank.jpg",
                'description' =>"Standard Chartered Bank Kenya Limited, commonly known as Standard Chartered Kenya, is a commercial bank that offers banking products and services such as transaction accounts, loans, savings, debit cards, and investments. Established in 1911, and therfore the oldest of the banks in Kenya, it is a subsidiary of the Standard Chartered, the British multinational financial group. Headquartered in Nairobi, it oversees a network of 33 branches and 90 ATMs throughout the country."
                ]);

                App\Bank::create([
                    'name' => 'Equity Bank Kenya',
                    'image' => "bank.jpg",
                    'description' =>"Financial services provider Equity Bank Kenya Limited was founded in 2014, making it one of the youngest banks in Kenya. It offers a wide range of financial products and services, including loans, mortgages, investments, debit and credit cards, retail banking, and microfinance. Based in Nairobi, it also operates subsidiaries in other countries, such as South Sudan, Rwanda, and Uganda."
                    ]);
                    App\Bank::create([
                        'name' => 'Diamond Trust Bank of Kenya',
                        'image' => "bank.jpg",
                        'description' =>"Diamond Trust Bank Kenya Ltd (DTB) provides various banking products and services, including mortgages, investments, insurance, savings and deposit accounts, debit and credit cards, money transfer services, and asset finance. Its flagship company is the Diamond Trust Bank Group, a major financial institution in East Africa, with a strong presence in other countries such as Uganda and Tanzania. Based in Nairobi, Diamond Trust Bank of Kenya was founded in 1945."
                        ]);
                        App\Bank::create([
                            'name' => 'National Bank of Kenya',
                            'image' => "bank.jpg",
                            'description' =>"The government-owned National Bank of Kenya, or simply National Bank, is one of the largest banks in Kenya, providing a range of products, including savings, loans, checking, debit and credit cards, and investments, to individuals, SMEs, and large corporations. Established in 1968, the bank operates out of Nairobi."
                            ]);

    }
}
