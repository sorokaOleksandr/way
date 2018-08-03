#include <fstream.h>
#include <iostream.h>
enum BOLL { FALSE, TRUE };

int main(int argc, char**argv)
{
    if( argc !=2 )
    {
        cout << "Usage : argv[0] <infile> \n";
    }
    
    ifstream fin(argv[1], ios::binary);
    if(!fin)
    {
            cout << "Unable to open " << argv[1] << "for reading. \n";
    }
    
    char ch;
    while( fin.get(ch) )
      if((ch > 32 && ch < 127) || ch == '\n' || ch == '\t')
        cout << ch;
        fin.close();
        system("pause");
    }
    //system("pause");
   // return 0;

