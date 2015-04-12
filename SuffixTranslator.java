import java.io.*;

class SuffixTranslator {

    static boolean debug = false;
    static int lookahead;

    public static void main (String [] args) throws IOException
    {
        System.out.print(">>> ");
        SuffixTranslator translator = new SuffixTranslator();
        translator.expr();
    }

    public SuffixTranslator() throws IOException {
        lookahead = System.in.read();
    }

    public void expr() throws IOException {
        if (debug) {
            System.err.println("expr " + (char) lookahead);
        }

        term();
        rest();
    }

    private void rest() throws IOException {
        if (debug) {
            System.err.println("rest " + (char) lookahead);
        }

        if (lookahead == '+') {
            match('+'); term(); System.out.write('+'); System.out.flush(); rest();
        } else if (lookahead == '-') {
            match('-'); term(); System.out.write('-'); System.out.flush(); rest();
        } else {
            return;
        }
    }

    private void term() throws IOException {
        if (debug) {
            System.err.println("term " + (char) lookahead);
        }

        if (Character.isDigit((char) lookahead)) {
            System.out.print((char) lookahead);
            match(lookahead);
        } else {
            throw new Error("Syntax error!");
        }
    }

    private void match(int terminal) throws IOException {
        if (debug) {
            System.err.println("match " + (char) terminal);
        }

        if (lookahead == terminal) {
            lookahead = System.in.read();
        } else {
            throw new Error("Syntax error!");
        }
    }

}
