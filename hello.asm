


segment .data
msg     db      "PLACEHOLDER", 0Ah    ; umieszcza w segmencie danych ciąg znaków zakończony znakiem końca linii

segment .text
        global  _start

_start:
        mov     eax, 4
        mov     ebx, 1
        mov     ecx, msg        
        mov     edx, 14         
        int     80h            


        mov     eax, 1
        xor     ebx, ebx
        int     0x80
