#include <iostream.h>
#include <fstream.h>

int main()
{
    char FileName[80];
    char Buffer[255];
    cout << "File name?: ";
    cin >> FileName;
    
    ifstream fin(FileName);
    if(fin)
    {
           cout << "Curent file Contents: \n";
           char ch;
           while( fin.get(ch) )
            cout << ch;
            
           cout << "\n***End file contents***\n";
    }
    fin.close();
    
    cout << "Opening " << FileName << " in open mode...\n";

    ofstream fout(FileName,ios::app);
    if(!fout)
    {
             cout << "Unable to open " << FileName << "for opening...\n";
             return (1);
    }
    
    cout << "\nEnter text to the file: ";
    cin.ignore(1,'\n');
    cin.getline(Buffer,255);
    fout << Buffer << "\n";
    fout.close();
    
    
    
    fin.open(FileName);
    if(!fin)
    {
       cout << "Unable to open" << FileName << " for reading.\n";
       return(1);    
    }
       cout << "\nHeres the contents of the file: \n";
       char ch;
       
       while( fin.get(ch) )
        cout << ch;
        
       cout << "\n***End file contents***\n";
    fin.close();    
    
    
    system("pause");
    return 0;
} 



           
