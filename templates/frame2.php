<?php
declare(strict_types=1);
/**
 * Page footer template - PHP 8.2 compatible
 * 
 * @param bool $showDoeLogo - Set to true to show DOE logo (for index_HPSS.php and index_RACF.php)
 */

$showDoeLogo = $showDoeLogo ?? false;
?>
            <!-- Content ends here -->
        </main>
    </div>
    
    <footer style="margin-top:20px;padding:10px;background:#003399;color:#fff">
        <?php if ($showDoeLogo): ?>
        <!-- DOE Logo Section -->
        <div style="display:flex;align-items:flex-start;gap:20px;max-width:900px;margin:0 auto;padding:10px">
            <a href="https://www.energy.gov/science/office-science">
                <img src="images/DOE_SC_PR_logo5.gif" alt="DOE Office of Science Logo" style="border:0">
            </a>
            <p style="font-family:Verdana,sans-serif;font-size:11px;color:#fff;text-align:left;margin:0">
                One of ten national laboratories overseen and primarily funded by the 
                Office of Science of the U.S. Department of Energy (DOE), Brookhaven 
                National Laboratory conducts research in the physical, biomedical, and 
                environmental sciences, as well as in energy technologies and national 
                security. Brookhaven Lab also builds and operates major scientific 
                facilities available to university, industry and government researchers. 
                Brookhaven is operated and managed for DOE's Office of Science by 
                Brookhaven Science Associates, a limited-liability company founded by 
                the Research Foundation of the State University of New York on behalf 
                of Stony Brook University, the largest academic user of Laboratory 
                facilities, and Battelle, a nonprofit, applied science and technology 
                organization.
            </p>
        </div>
        <hr style="border:0;border-top:1px solid #6699cc;margin:10px auto;max-width:900px">
        <?php endif; ?>
        
        <div style="text-align:center">
            <p style="margin:5px 0">&copy; <?= date('Y') ?> Brookhaven National Laboratory. All rights reserved.</p>
            <p style="margin:5px 0">
                <a href="https://www.bnl.gov/privacy/" style="color:#fff">Privacy and Security Notice</a>
                &nbsp;&nbsp;
            </p>
        </div>
    </footer>
</body>
</html>