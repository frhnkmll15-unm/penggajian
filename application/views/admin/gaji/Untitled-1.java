
ublic static void main args (); {
    first fr = new first();
    String n = fr.genText()+"@mail.com";

    for (int i = 0; i<=9; i++) {
        System.out.println(n);
    }
}

public String genText() {
    String randomText = "abcdefghijklmnopqrstuvwxyz";
    int length = 4;
    String temp = RandomStringUtils.random(length, randomText);
    return temp;
}