#include <fstream.h>
#include <iostream.h>

int main(int argc, char**argv)
{
    for(int ctr = argc -1; ctr; ctr--)
     cout << argv[ctr] << " ";
     system("pause");
     return 0;
}
