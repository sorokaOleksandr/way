#define DEBUG

#include <iostream.h>

#ifndef DEBUG
   #define ASSERT(x)
#else
   #define ASSERT(x)\
          if(! (x)) \
          {   \
               cout << "ERROR!! Asert: " << #x << " failed \n"; \
               cout << " in file: " << __FILE__ << "\n"; \
               cout << " on line: " << __LINE__ << "\n"; \
          }
#endif

#ifndef DEBUG
   #define ASSERT(y)
#else
   #define ASSERT(y)\
          if(! (y)) \
          {   \
               cout << "ERROR!! Asert: " << #y << " failed \n"; \
               cout << " in file: " << __FILE__ << "\n"; \
               cout << " on line: " << __LINE__ << "\n"; \
          }
#endif






int main()
{
    int x = 5;
    int y = 8;
    
    cout << "Pered pervim makrosom: \n";
    ASSERT(y == 5)
    
    cout << "Perviy makros: \n";
    ASSERT(x == 5)
    
    
    cout << "Vtoroy makros: \n";
    ASSERT(x != 5);
    
    cout << "\nVipolneno!\n";
    
    system("pause");
    return 0;
}
    
