#include <iostream>
#include <cstdlib>
using namespace std;
int pilihan, a, b;
int menu(){
	menu : 
	cout << "Selamat datang Di Kalkulator Sederhana C++\n";
	cout << "1. Perkalian\n";
	cout << "2. Pembagian\n";
	cout << "3. Penjumlahan\n";
	cout << "4. Penguragan\n";
	cout << "masukan pilihan : "; cin  >> pilihan;
}
int ambil_input(){
	cout << "first input :"; cin >> a;
	cout << "second input :"; cin >> b;
}
int main(){
	if(pilihan != 0 && pilihan <= 4)
	{
		ambil_input();
		if(pilihan == 1)
		{
			cout << "Hasil "<< a << " dikali "<< b << " adalah : " << a*b;
		}
		else if(pilihan == 2)
		{
			cout << "Hasil "<< a << " dibagi "<< b << " adalah : " << a/b;
		}
		else if(pilihan == 3)
		{
			cout << "Hasil "<< a << " ditambah "<< b << " adalah : " << a+b;
		}
		else if(pilihan == 4)
		{
			cout << "Hasil "<< a << " dikurangi "<< b << " adalah : " << a-b;
		}
	}
	else
	{
		cout << "pilihan tidak tersedia !\n";
		menu();
		main();
	}
}
