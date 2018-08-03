#include <iostream.h>

int main()
{
    int stolbci, radki;
    char simvol;
    cout << "Skolko Stolbcov?";
    cin >> stolbci;
    cout << "Skolko Radov?";
    cin >> radki;
    cout << "Kakim simvolom zapolnit matricu?";
    cin >> simvol;
    for(int i = 0; i < radki; i++)
    {
            for(int j = 0; j < stolbci; j++)
            cout << simvol;
            cout << "\n";
            }
            system("pause");
            return 0;
            }
