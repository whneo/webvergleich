<table border="1">
    <thead>
        <tr>
            <th colspan="2">Was möchten sie machen?</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> 
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="Element einlesen"></input>
                    <input type="hidden" name="einlesenSent" value="1" />
                </form>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="Element vergleichen"></input>
                    <input type="hidden" name="vergleichenSent" value="1" />
                </form>
            </td>
        </tr>
    </tbody>
</table>