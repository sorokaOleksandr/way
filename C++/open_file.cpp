#include <fstream.h>
#include <iostream.h>

int main()
{
    char FileName[80];
    char Buffer[255];
    cout << "File name: ";
    cin >> FileName ;
    
    ofstream fout(FileName);
    fout << "Sodergimoe Fiyla... \n";
    
    cout << "Enter the text for the file: ";
    cin.ignore(1, '\n');
    cin.getline(Buffer, 255);
    fout << Buffer << "\n";
    fout.close();
    
    ifstream fin(FileName);
    cout << "This contents files : \n";
    char ch;
    while( fin.get(ch) )
     cout << ch;
     
     
    cout << "\n *** End File contents*** \n";
    fin.close();
    
    system("pause");
    return 0;
}
    
    
    
    
