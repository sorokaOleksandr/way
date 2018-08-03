#include <iostream.h>
int main(int argc, char *argv[])
{
    if(argc > 1)
    {
            cout << "Resived: " << argc << "arguments...\n";
            for(int i=0; i < argc; i++)
               cout << " arguments: " << i << ": " << argv[i] << endl;
    }
    else
    {
        cout << "not arguments" << endl;
    }
    system("pause");
    return 0;
}
